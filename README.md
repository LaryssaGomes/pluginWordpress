# Questionamentos comuns

o que são widgets ?
Ficam na parte de "Aparência", são uma estrutura visual do site que com um simples arrasta e solta podemos atualizar a pagina normalmente algo vinculado ao tema usado, representam geralmente, como exibir menus de navegação, categorias de posts, arquivos, formulários de pesquisa, listas de páginas, calendários, nuvens de tags, entre outros.

o que são shortcodes?
Básicamente e um apelido para um código específico seja ele um componente visual complexo ou não, devem ser inserido diretamente no editor wordpress, envolvendo o conteúdo desejado entre colchetes com uma palavra-chave ou identificador.

# Criando um plugin
1 - Arquivo inicializador]

Na pasta wordpress/wp-content/plugins, onde os plugins instalados no WordPress são armazenados, crie uma nova pasta chamada al_local_dia_palestra. Dentro dessa pasta, crie um arquivo chamado al_local_dia_palestra.php.

Nesse arquivo vamos determina alguns dados padrões do plugin como Nome, Descrição, versão e Autor. Em seguida, adicionaremos uma condição de segurança usando uma estrutura if para verificar se o WordPress está acessando o plugin. Caso contrário, a execução será interrompida.
```php
<?php
/*
 * Plugin Name: Cadastrar local e data da palestra
 * Description: Plugin para cadastrar local e data da próxima palestra realizada pela Alura
 * Version: 1.0.0
 * Author: Nome
 */

if (!defined('ABSPATH')) {
    exit; // Encerra a execução se o acesso direto ao arquivo for tentado
}

// Aqui você pode adicionar o código do seu plugin
```

Dentro da pasta al_local_dia_palestra crier uma pasta chamada includes ...


