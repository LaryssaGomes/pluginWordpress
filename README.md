# Criando um plugin
1 - Arquivo inicializador
Na pasta wordpress/wp-content/plugins, onde os plugins instalados no WordPress são armazenados, crie uma nova pasta chamada al_local_dia_palestra. Dentro dessa pasta, crie um arquivo chamado al_local_dia_palestra.php.

Nesse arquivo vamos determina alguns dados padrões do plugin como Nome, Descrição, versão e Autor. Em seguida, adicionaremos uma condição de segurança usando uma estrutura if para verificar se o WordPress está acessando o plugin. Caso contrário, a execução será interrompida.
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


