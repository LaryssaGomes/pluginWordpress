<?php

add_action('admin_menu', 'al_local_dia_palestra_menu');
function al_local_dia_palestra_menu()
{
    add_menu_page(
        'Local Palestra',// titulo da pagina
        'Local Palestra',// Titulo do menu
        'manage_options',// Tipo de usuario
        'local-palestra',// identificador slug-name
        'al_local_dia_palestra_menu_pagina', // nome da função
        'dashicons-location-alt',// rota do icone
        -1 // posição no menu
    );
}

// no atributo action deve ser sempre options.php
function al_local_dia_palestra_menu_pagina()
{
    ?>
    <div>
        <h1>Local Palestras</h1>
        <form method="post" action="options.php">
            <?php
            settings_errors();
            // Espera receber o slug-name, vincula a secão
            do_settings_sections('local-palestra');
            //  VinculO ao grupo de daods
            settings_fields('al_local_dia_palestra_settings');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
// criando uma seção
add_action('admin_menu', 'al_local_dia_palestra_secao');
function al_local_dia_palestra_secao()
{
    //Seção
    add_settings_section(
        'al_local_dia_palestra_secao',// identificador
        'Configurações do local da palestra',// Titulo
        'al_local_dia_palestra_campos_secao_detalhes', // Funcao
        'local-palestra' // Pertence a pagina com esse slug-name
    );

    //Endereço
    add_settings_field(
        'al_local_dia_palestra_endereco',// identificador
        'Endereço',// Titulo
        'al_local_dia_palestra_endereco',// Função
        'local-palestra', // Pertence a pagina com esse slug-name
        'al_local_dia_palestra_secao' // Pertence a qual seção da pagina 
    );

    // Registro de entrada de dados no banco
    register_setting(
        'al_local_dia_palestra_settings',// grupo de dados
        'al_local_dia_palestra_endereco',// Identificador do endereço
        'verifica_endereco'// Verificando dado
    );

    //Cidade
    add_settings_field(
        'al_local_dia_palestra_cidade',
        'Cidade',
        'al_local_dia_palestra_cidade',
        'local-palestra',
        'al_local_dia_palestra_secao'
    );

    register_setting(
        'al_local_dia_palestra_settings',
        'al_local_dia_palestra_cidade',
        'verifica_cidade'
    );

    //Data
    add_settings_field(
        'al_local_dia_palestra_data',
        'Data',
        'al_local_dia_palestra_data',
        'local-palestra',
        'al_local_dia_palestra_secao'
    );

    register_setting(
        'al_local_dia_palestra_settings',
        'al_local_dia_palestra_data',
        'verifica_data'
    );
}

//Função callback seção
function al_local_dia_palestra_campos_secao_detalhes()
{
    ?>
    <p>Insira os dados do endereço, cidade e data da próxima palestra da Alura</p>
    <?php
}

//Função callback endereço
// esc_attr espaca qualquer codigo adicionado 
function al_local_dia_palestra_endereco()
{
    ?>
    <input type="text" id="al_local_dia_palestra_endereco"
           name="al_local_dia_palestra_endereco" value="<?= esc_attr(get_option('al_local_dia_palestra_endereco')) ?>" required>
    <?php
}

//Função callback cidade
function al_local_dia_palestra_cidade()
{
    ?>
    <input type="text" id="al_local_dia_palestra_cidade"
           name="al_local_dia_palestra_cidade" value="<?= esc_attr(get_option('al_local_dia_palestra_cidade')) ?>"required>
    <?php
}

//Função callback data
function al_local_dia_palestra_data()
{
    ?>
    <input type="date" id="al_local_dia_palestra_data"
           name="al_local_dia_palestra_data" value="<?= esc_attr(get_option('al_local_dia_palestra_data'))?>" required>
    <?php
}

/*
 * Configuração de callback de verificação dos campos
 */

//Endereço
function verifica_endereco($endereco){
    if(empty($endereco)){
        // pegando dado do banco
        $endereco = get_option('al_local_dia_palestra_endereco');
        add_settings_error(
            'al_local_dia_palestra_mensagem_erro',// grupo de configuração
            'al_local_dia_palestra_erro_endereco',// identificador
            'O campo endereço não pode ser vazio!',// mensagem de error
            'error'// tipo
        );
    }
    return $endereco;
}

//Cidade
function verifica_cidade($cidade){
    if(empty($cidade)){
        $cidade = get_option('al_local_dia_palestra_cidade');
        add_settings_error(
            'al_local_dia_palestra_mensagem_erro',
            'al_local_dia_palestra_erro_cidade',
            'O campo cidade não pode ser vazio!',
            'error'
        );
    }
    return $cidade;
}

//Data
function verifica_data($data){
    if(empty($data)){
        $data = get_option('al_local_dia_palestra_data');
        add_settings_error(
            'al_local_dia_palestra_mensagem_erro',
            'al_local_dia_palestra_erro_data',
            'O campo data não pode ser vazio!',
            'error'
        );
    }
    return $data;
}