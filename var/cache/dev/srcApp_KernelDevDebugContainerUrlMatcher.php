<?php

use Symfony\Component\Routing\Matcher\Dumper\PhpMatcherTrait;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    use PhpMatcherTrait;

    public function __construct(RequestContext $context)
    {
        $this->context = $context;
        $this->staticRoutes = [
            '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
            '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
            '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
            '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
            '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
            '/cadastrar-produto' => [[['_route' => 'cadastro_produto', '_controller' => 'App\\Controller\\Admin\\CadastroProdutoController::index'], null, null, null, false, false, null]],
            '/pedidos-geral' => [[['_route' => 'pedidos_admin', '_controller' => 'App\\Controller\\Admin\\PedidosController::listarPedidosAdmin'], null, null, null, false, false, null]],
            '/backup' => [[['_route' => 'backup', '_controller' => 'App\\Controller\\Admin\\PedidosController::backup'], null, null, null, false, false, null]],
            '/cadastro' => [[['_route' => 'cadastrar_usuario', '_controller' => 'App\\Controller\\Base\\CadastroController::create'], null, null, null, false, false, null]],
            '/' => [[['_route' => 'default', '_controller' => 'App\\Controller\\DefaultController::index'], null, null, null, false, false, null]],
            '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\SecurityController::login'], null, null, null, false, false, null]],
            '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\SecurityController::logout'], null, ['GET' => 0], null, false, false, null]],
            '/solicitar-senha' => [[['_route' => 'solicitar_senha', '_controller' => 'App\\Controller\\SecurityController::solicitarSenha'], null, null, null, false, false, null]],
            '/carrinho' => [[['_route' => 'carrinho', '_controller' => 'App\\Controller\\Usuario\\CarrinhoController::index'], null, null, null, false, false, null]],
            '/pedidos' => [[['_route' => 'pedidos_user', '_controller' => 'App\\Controller\\Usuario\\PedidosController::listarPedidosUsuario'], null, null, null, false, false, null]],
        ];
        $this->regexpList = [
            0 => '{^(?'
                    .'|/_(?'
                        .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                        .'|wdt/([^/]++)(*:57)'
                        .'|profiler/([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:102)'
                                .'|router(*:116)'
                                .'|exception(?'
                                    .'|(*:136)'
                                    .'|\\.css(*:149)'
                                .')'
                            .')'
                            .'|(*:159)'
                        .')'
                    .')'
                    .'|/status(?'
                        .'|/([^/]++)(*:188)'
                        .'|\\-back/([^/]++)(*:211)'
                    .')'
                    .'|/pedido/([^/]++)(*:236)'
                    .'|/a(?'
                        .'|rquivar(?:/([^/]++))?(*:270)'
                        .'|dicionar\\-ao\\-carrinho(?:/([^/]++))?(*:314)'
                    .')'
                    .'|/verificar\\-(?'
                        .'|email(?:/([^/]++))?(*:357)'
                        .'|codigo(?:/([^/]++))?(*:385)'
                    .')'
                    .'|/re(?'
                        .'|cuperar\\-senha(?:/([^/]++))?(*:428)'
                        .'|mover_do_carrinho/([^/]++)(*:462)'
                    .')'
                    .'|/finalizar\\-pedido(?:/([^/]++))?(*:503)'
                    .'|/js/routing(?:\\.(js|json))?(*:538)'
                .')/?$}sDu',
        ];
        $this->dynamicRoutes = [
            38 => [[['_route' => '_twig_error_test', '_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
            57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
            102 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
            116 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
            136 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception::showAction'], ['token'], null, null, false, false, null]],
            149 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception::cssAction'], ['token'], null, null, false, false, null]],
            159 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
            188 => [[['_route' => 'status', '_controller' => 'App\\Controller\\Admin\\PedidosController::status'], ['id'], null, null, false, true, null]],
            211 => [[['_route' => 'status_back', '_controller' => 'App\\Controller\\Admin\\PedidosController::statusBack'], ['id'], null, null, false, true, null]],
            236 => [[['_route' => 'pedido', '_controller' => 'App\\Controller\\Base\\PedidoController::viewPedido'], ['id'], null, null, false, true, null]],
            270 => [[['_route' => 'arquivar', 'id' => 0, '_controller' => 'App\\Controller\\DefaultController::arquivar'], ['id'], null, null, false, true, null]],
            314 => [[['_route' => 'adicionar_carrinho', 'idProduto' => 0, '_controller' => 'App\\Controller\\Usuario\\CarrinhoController::adicionar'], ['idProduto'], null, null, false, true, null]],
            357 => [[['_route' => 'verificar_email', 'email' => '', '_controller' => 'App\\Controller\\SecurityController::verificarEmail'], ['email'], null, null, false, true, null]],
            385 => [[['_route' => 'verificar_codigo', 'codigo' => 0, '_controller' => 'App\\Controller\\SecurityController::verificarCodigo'], ['codigo'], null, null, false, true, null]],
            428 => [[['_route' => 'recuperar_senha', 'codigo' => 0, '_controller' => 'App\\Controller\\SecurityController::recuperarSenha'], ['codigo'], null, null, false, true, null]],
            462 => [[['_route' => 'remover_carrinho', '_controller' => 'App\\Controller\\Usuario\\CarrinhoController::remover'], ['idProduto'], null, null, false, true, null]],
            503 => [[['_route' => 'finalizar_pedido', 'obs' => 'Nenhuma Observação foi adicionada', '_controller' => 'App\\Controller\\Usuario\\CarrinhoController::finalizarPedido'], ['obs'], null, null, false, true, null]],
            538 => [[['_route' => 'fos_js_routing_js', '_controller' => 'fos_js_routing.controller::indexAction', '_format' => 'js'], ['_format'], ['GET' => 0], null, false, true, null]],
        ];
    }
}
