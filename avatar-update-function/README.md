# Função de Atualização de Avatar no WordPress

Este repositório contém código PHP e JavaScript para permitir que os usuários atualizem seus avatares no frontend de um site WordPress, com a opção de deletar o avatar antigo. O repositório também inclui dois shortcodes para exibir o formulário de atualização de avatar e a foto de perfil do usuário.

## Como Usar

1. Adicione o código do arquivo `update-avatar-function.php` ao seu tema WordPress ou a um plugin personalizado. Este arquivo contém a função de atualização de avatar e os shortcodes relacionados.

2. Os seguintes shortcodes estão disponíveis:

   - `[avatar_form]`: Este shortcode exibe um formulário para que os usuários façam o upload de um novo avatar.

   - `[user_avatar]`: Este shortcode exibe a foto de perfil do usuário atual do WordPress.

3. Para usar um shortcode em uma página ou post, insira o shortcode entre colchetes. Por exemplo, `[avatar_form]` exibirá o formulário de atualização de avatar, e `[user_avatar]` exibirá a foto de perfil do usuário.

4. Os shortcodes podem ser usados em qualquer página ou post do WordPress. Basta inseri-los no conteúdo da página ou post, e eles serão substituídos pela saída apropriada quando a página for visualizada.

## Requisitos

- Este código requer o plugin [Simple Local Avatars](https://wordpress.org/plugins/simple-local-avatars/) para funcionar corretamente. Certifique-se de que o plugin esteja instalado e ativado no seu site WordPress.

- O arquivo JavaScript `avatar-update.js` é usado para aprimorar a experiência do usuário. Certifique-se de que ele esteja enfileirado no seu site WordPress.

- O formulário requer o jQuery para funcionar corretamente. Certifique-se de que o jQuery esteja carregado em seu site antes de usar este formulário. Você pode fazer o download do jQuery diretamente [aqui](https://code.jquery.com/jquery-3.6.0.min.js) ou verificar se ele já está incluído no seu tema ou plugins.

## Contribuições

Contribuições são bem-vindas. Sinta-se à vontade para abrir issues e enviar pull requests para melhorar esta função.

