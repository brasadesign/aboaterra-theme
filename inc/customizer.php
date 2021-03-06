<?php
/**
 * Xangô Theme Customizer
 *
 */
include_once get_template_directory() . '/inc/kirki/kirki.php';

/**
 * Add footer fields
 */
/**
 * Create the setting
 */
function boaterra_register_section( $wp_customize ) {
	/**
	 * Add sections
	 */
	$wp_customize->add_section( 'social', array(
		'title'       => __( 'Informações / Redes Sociais', 'odin' ),
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'footer', array(
		'title'       => __( 'Rodapé', 'odin' ),
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'delivery', array(
		'title'       => __( 'Mensagens/Informações de entrega', 'odin' ),
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'geral', array(
		'title'       => __( 'Configurações opcionais', 'odin' ),
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'header_warn', array(
		'title'       => __( 'Cabeçalho de aviso de região', 'odin' ),
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'featured_product', array(
		'title'       => __( 'Produto destacado (livro)', 'odin' ),
		'priority'    => 10,
	) );
}
add_action( 'customize_register', 'boaterra_register_section' );
function aboaterra_esc_url_raw( $str ) {
	return $str;
}
function boaterra_kirki_fields( $fields ) {

	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'phone',
		'label'    => __( 'Telefone', 'odin' ),
		'section'  => 'social',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'whatsapp',
		'label'    => __( 'WhatsApp', 'odin' ),
		'section'  => 'social',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'facebook',
		'label'    => __( 'Facebook', 'odin' ),
		'section'  => 'social',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'instagram',
		'label'    => __( 'Instagram', 'odin' ),
		'section'  => 'social',
		'default'  => '',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'image',
		'setting'  => 'footer-image',
		'label'    => __( 'Logo no rodapé', 'odin' ),
		'section'  => 'footer',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'delivery_success',
		'label'    => __( 'Mensagem de endereço atendido (sucesso)', 'odin' ),
		'section'  => 'delivery',
		'sanitize_callback' => 'aboaterra_esc_url_raw',
		'priority' => 1,
	);

	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'delivery_error_redirect',
		'label'    => __( 'URL para redirecionar quando o endereço não for atendido', 'odin' ),
		'section'  => 'delivery',
		'sanitize_callback' => 'aboaterra_esc_url_raw',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'delivery_error',
		'label'    => __( 'Mensagem de erro de CEP não atendido no checkout', 'odin' ),
		'section'  => 'delivery',
		'sanitize_callback' => 'aboaterra_esc_url_raw',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'delivery_time',
		'label'    => __( 'Mensagem de portaria 24hrs com link', 'odin' ),
		'section'  => 'delivery',
		'sanitize_callback' => 'aboaterra_esc_url_raw',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'code_open_body',
		'label'    => __( 'Bloco de código após a abertura da tag <body>', 'odin' ),
		'section'  => 'geral',
		'sanitize_callback' => 'aboaterra_esc_url_raw',
		'priority' => 1,
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'code_close_body',
		'label'    => __( 'Bloco de código antes do fechamento da tag <body> no rodapé', 'odin' ),
		'section'  => 'geral',
		'priority' => 1,
		'sanitize_callback' => 'aboaterra_esc_url_raw',
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'header_warn_logged',
		'label'    => __( 'Texto quando o usuário estiver logado', 'odin' ),
		'section'  => 'header_warn',
		'priority' => 1,
		'sanitize_callback' => 'aboaterra_esc_url_raw',
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'header_warn_unlogged',
		'label'    => __( 'Texto quando o usuário NÃO estiver logado', 'odin' ),
		'section'  => 'header_warn',
		'priority' => 1,
		'sanitize_callback' => 'aboaterra_esc_url_raw',
	);
	$fields[] = array(
		'type'     => 'image',
		'setting'  => 'featured_product_thumb',
		'label'    => __( 'Imagem', 'odin' ),
		'section'  => 'featured_product',
		'priority' => 1,
		'sanitize_callback' => 'aboaterra_esc_url_raw',
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'featured_product_title',
		'label'    => __( 'Título', 'odin' ),
		'section'  => 'featured_product',
		'priority' => 1,
		'sanitize_callback' => 'aboaterra_esc_url_raw',
	);
	$fields[] = array(
		'type'     => 'textarea',
		'setting'  => 'featured_product_content',
		'label'    => __( 'Descrição', 'odin' ),
		'section'  => 'featured_product',
		'priority' => 1,
		'sanitize_callback' => 'aboaterra_esc_url_raw',
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'featured_product_readmore',
		'label'    => __( 'Link Saiba Mais', 'odin' ),
		'section'  => 'featured_product',
		'priority' => 1,
		'sanitize_callback' => 'aboaterra_esc_url_raw',
	);
	$fields[] = array(
		'type'     => 'text',
		'setting'  => 'featured_product_buy',
		'label'    => __( 'Link para comprar', 'odin' ),
		'section'  => 'featured_product',
		'priority' => 1,
		'sanitize_callback' => 'aboaterra_esc_url_raw',
	);

	return $fields;
}
add_filter( 'kirki/fields', 'boaterra_kirki_fields' );
