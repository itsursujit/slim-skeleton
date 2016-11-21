# MVC Approach on Slim Framework 3 

Use this skeleton application to quickly setup and start working on a new Slim Framework 3 application. This application uses the latest Slim 3 with the PHP-View template renderer. It also uses the Monolog logger.

This skeleton application was built for Composer. This makes setting up a new Slim Framework application quick and easy.

## Install the Application

Download Zip or Clone the repository to your local. Update the dependencies using

    composer update

* Point your virtual host document root to your new application's `public/` directory.
* Ensure `logs/` is web writeable.

## Folder Structure

 **Config Directory** holds the configuration for the application along with autoloading classes, db credentials
 **Controllers Directory** has the controllers required to act as a middleware between request, logic and response
 **Models Directory** has all the business logic. Implemented from Libraries/Model.php
 **Routes/route.php** provides the routing system. You can add route in this file
 **Views Directory** holds all the presentation related files.
 
### Example: Controller

    <?php
       
    namespace app\Controllers;
   
    use App\Model\Customer;
    use Slim\Http\Request;
    use Slim\Http\Response;
    
    class WelcomeController extends Controller
    {
        public $renderer;
        
        public function __construct($renderer)
        {
            $this->renderer = $renderer;
        }
        
        public function dispatch(Request $request, Response $response, array $args)
        {
            $customer = new Customer();
            $data = $customer->getOrderById(1);
            $this->renderer->render($response, 'welcome/index.phtml', $data);
        }
    }

 
### Example: Routing

     <?php
     
     use app\Libraries\Route;
     
     Route::get('/getorder/orderid/{id}', 'OrderController:getOrder');
     Route::get('/cancelorder/orderid/{id}', 'OrderController:cancelOrder');