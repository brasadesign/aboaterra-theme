<?php
/**
 *
 * ACF Fields
 *
*/
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_configuracoes-da-pagina',
		'title' => 'Configurações da Página',
		'fields' => array (
			array (
				'key' => 'field_57a1256b0c854',
				'label' => 'Mensagem de região não atendida',
				'name' => 'regioes_error',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-regioes.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_conteudo-no-lado-direito',
		'title' => 'Conteúdo no lado direito',
		'fields' => array (
			array (
				'key' => 'field_57ed7e205e297',
				'label' => 'Conteúdo no lado direito',
				'name' => 'right_content',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'yes',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-contato.php',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_exibir-produto-destacado-no-rodape-livro',
		'title' => 'Exibir produto destacado no rodapé (livro)',
		'fields' => array (
			array (
				'key' => 'field_57edc316eb760',
				'label' => 'Deseja exibir o produto destacado (livro) no rodapé?',
				'name' => 'show_featured_product',
				'type' => 'true_false',
				'message' => '',
				'default_value' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'product',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
