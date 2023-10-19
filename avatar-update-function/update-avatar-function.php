<?php
// Função para atualizar avatar no frontend e deletar o avatar antigo
if (isset($_POST['submit']) && is_user_logged_in()) {
    $user_id = get_current_user_id();
    $avatar = $_FILES['avatar'];
    $msgAvatar = ''; // Inicializa a variável para a mensagem
    $msgClass = ''; // Inicializa a classe para o popup

    // Verifique se é uma imagem válida
    $file_type = wp_check_filetype($avatar['name'], array('jpg|jpeg|jpe' => 'image/jpeg', 'gif' => 'image/gif', 'png' => 'image/png'));

    if ($file_type['ext']) {
        // Inclui arquivos necessários do WordPress
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/media.php';
        require_once ABSPATH . 'wp-admin/includes/image.php';

        // Lida com o upload da imagem e obtém um ID de anexo
        $attachment_id = media_handle_upload('avatar', 0);

        if (!is_wp_error($attachment_id)) {
            // Exclui a imagem de perfil antiga do usuário
            $avatar_id_atual = get_user_meta($user_id, 'simple_local_avatar', true);
            if ($avatar_id_atual) {
                wp_delete_attachment($avatar_id_atual, true);
            }

            // Atualiza o avatar do usuário no campo 'simple_local_avatar'
            $sla = new Simple_Local_Avatars();
            $sla->assign_new_user_avatar($attachment_id, $user_id);
            $msgAvatar = 'Avatar atualizado com sucesso!';
            $msgClass = 'success';
        } else {
            $msgAvatar = 'Erro ao fazer o upload do avatar.';
            $msgClass = 'error';
        }
    } else {
        $msgAvatar = 'Arquivo de imagem inválido.';
        $msgClass = 'error';
    }
    
    // Exibe a mensagem como um popup com um botão de fechamento
    echo '<div class="alertaAvatar ' . esc_attr($msgClass) . '">' . esc_html($msgAvatar) . '<span class="fecharPopup" onclick="fecharPopup(this)">&times;</span></div>';
}

// Shortcode: Formulário para atualizar foto de perfil
function avatar_form_shortcode() {
    ob_start();
    ?>
    <form method="post" enctype="multipart/form-data" id="update-avatar-form">
        <div class="p-image">
            <i class="fa fa-pen upload-button"></i>
            <input class="file-upload" type="file" name="avatar" accept=".jpg, .jpeg, .gif, .png" style="display:none;">
            <i class="fa fa-trash clear-button" style="display:none;"></i>
        </div>
        <input id="atualizarAvatar" type="submit" name "submit" value="Salvar novo avatar" style="display:none;">
    </form>
    <?php

    return ob_get_clean();
}
add_shortcode('avatar_form', 'avatar_form_shortcode');

// Shortcode: Exibir Avatar
function user_avatar_shortcode() {
    // Obtenha a foto de perfil do usuário atual do WordPress
    $avatar_url = get_avatar_url(get_current_user_id());

    // Construa a saída HTML
    $output = '<div id="imgPerfil"><img src="' . esc_url($avatar_url) . '"></div>';

    return $output;
}
add_shortcode('user_avatar', 'user_avatar_shortcode');

// Adicionar o arquivo JavaScript avatar-update.js
function enqueue_avatar_script() {
    wp_enqueue_script('avatar-update', get_template_directory_uri() . '/avatar-update.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_avatar_script');
