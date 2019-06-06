<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class srcApp_KernelDevDebugContainerUrlGenerator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;
    private $defaultLocale;

    public function __construct(RequestContext $context, LoggerInterface $logger = null, string $defaultLocale = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        $this->defaultLocale = $defaultLocale;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        '_twig_error_test' => [['code', '_format'], ['_controller' => 'twig.controller.preview_error::previewErrorPageAction', '_format' => 'html'], ['code' => '\\d+'], [['variable', '.', '[^/]++', '_format', true], ['variable', '/', '\\d+', 'code', true], ['text', '/_error']], [], []],
        '_wdt' => [['token'], ['_controller' => 'web_profiler.controller.profiler::toolbarAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_wdt']], [], []],
        '_profiler_home' => [[], ['_controller' => 'web_profiler.controller.profiler::homeAction'], [], [['text', '/_profiler/']], [], []],
        '_profiler_search' => [[], ['_controller' => 'web_profiler.controller.profiler::searchAction'], [], [['text', '/_profiler/search']], [], []],
        '_profiler_search_bar' => [[], ['_controller' => 'web_profiler.controller.profiler::searchBarAction'], [], [['text', '/_profiler/search_bar']], [], []],
        '_profiler_phpinfo' => [[], ['_controller' => 'web_profiler.controller.profiler::phpinfoAction'], [], [['text', '/_profiler/phpinfo']], [], []],
        '_profiler_search_results' => [['token'], ['_controller' => 'web_profiler.controller.profiler::searchResultsAction'], [], [['text', '/search/results'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_open_file' => [[], ['_controller' => 'web_profiler.controller.profiler::openAction'], [], [['text', '/_profiler/open']], [], []],
        '_profiler' => [['token'], ['_controller' => 'web_profiler.controller.profiler::panelAction'], [], [['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_router' => [['token'], ['_controller' => 'web_profiler.controller.router::panelAction'], [], [['text', '/router'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_exception' => [['token'], ['_controller' => 'web_profiler.controller.exception::showAction'], [], [['text', '/exception'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        '_profiler_exception_css' => [['token'], ['_controller' => 'web_profiler.controller.exception::cssAction'], [], [['text', '/exception.css'], ['variable', '/', '[^/]++', 'token', true], ['text', '/_profiler']], [], []],
        'cadastro_produto' => [[], ['_controller' => 'App\\Controller\\Admin\\CadastroProdutoController::index'], [], [['text', '/cadastrar-produto']], [], []],
        'pedidos_admin' => [[], ['_controller' => 'App\\Controller\\Admin\\PedidosController::listarPedidosAdmin'], [], [['text', '/pedidos-geral']], [], []],
        'status' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PedidosController::status'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/status']], [], []],
        'status_back' => [['id'], ['_controller' => 'App\\Controller\\Admin\\PedidosController::statusBack'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/status-back']], [], []],
        'cadastrar_usuario' => [[], ['_controller' => 'App\\Controller\\Base\\CadastroController::create'], [], [['text', '/cadastro']], [], []],
        'pedido' => [['id'], ['_controller' => 'App\\Controller\\Base\\PedidoController::viewPedido'], [], [['variable', '/', '[^/]++', 'id', true], ['text', '/pedido']], [], []],
        'default' => [[], ['_controller' => 'App\\Controller\\DefaultController::index'], [], [['text', '/']], [], []],
        'app_login' => [[], ['_controller' => 'App\\Controller\\SecurityController::login'], [], [['text', '/login']], [], []],
        'app_logout' => [[], ['_controller' => 'App\\Controller\\SecurityController::logout'], [], [['text', '/logout']], [], []],
        'solicitar_senha' => [[], ['_controller' => 'App\\Controller\\SecurityController::solicitarSenha'], [], [['text', '/solicitar-senha']], [], []],
        'verificar_email' => [['email'], ['email' => '', '_controller' => 'App\\Controller\\SecurityController::verificarEmail'], [], [['variable', '/', '[^/]++', 'email', true], ['text', '/verificar-email']], [], []],
        'verificar_codigo' => [['codigo'], ['codigo' => 0, '_controller' => 'App\\Controller\\SecurityController::verificarCodigo'], [], [['variable', '/', '[^/]++', 'codigo', true], ['text', '/verificar-codigo']], [], []],
        'recuperar_senha' => [['codigo'], ['codigo' => 0, '_controller' => 'App\\Controller\\SecurityController::recuperarSenha'], [], [['variable', '/', '[^/]++', 'codigo', true], ['text', '/recuperar-senha']], [], []],
        'carrinho' => [[], ['_controller' => 'App\\Controller\\Usuario\\CarrinhoController::index'], [], [['text', '/carrinho']], [], []],
        'adicionar_carrinho' => [['idProduto'], ['idProduto' => 0, '_controller' => 'App\\Controller\\Usuario\\CarrinhoController::adicionar'], [], [['variable', '/', '[^/]++', 'idProduto', true], ['text', '/adicionar-ao-carrinho']], [], []],
        'remover_carrinho' => [['idProduto'], ['_controller' => 'App\\Controller\\Usuario\\CarrinhoController::remover'], [], [['variable', '/', '[^/]++', 'idProduto', true], ['text', '/remover_do_carrinho']], [], []],
        'finalizar_pedido' => [['obs'], ['obs' => 'Nenhuma Observação foi adicionada', '_controller' => 'App\\Controller\\Usuario\\CarrinhoController::finalizarPedido'], [], [['variable', '/', '[^/]++', 'obs', true], ['text', '/finalizar-pedido']], [], []],
        'pedidos_user' => [[], ['_controller' => 'App\\Controller\\Usuario\\PedidosController::listarPedidosUsuario'], [], [['text', '/pedidos']], [], []],
        'fos_js_routing_js' => [['_format'], ['_controller' => 'fos_js_routing.controller::indexAction', '_format' => 'js'], ['_format' => 'js|json'], [['variable', '.', 'js|json', '_format', true], ['text', '/js/routing']], [], []],
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        $locale = $parameters['_locale']
            ?? $this->context->getParameter('_locale')
            ?: $this->defaultLocale;

        if (null !== $locale && null !== $name) {
            do {
                if ((self::$declaredRoutes[$name.'.'.$locale][1]['_canonical_route'] ?? null) === $name) {
                    unset($parameters['_locale']);
                    $name .= '.'.$locale;
                    break;
                }
            } while (false !== $locale = strstr($locale, '_', true));
        }

        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
