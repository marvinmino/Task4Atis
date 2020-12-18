<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7c8f0a8154fcdea89657ac618ee8ac86
{
    public static $files = array (
        '79f66bc0a1900f77abe4a9a299057a0a' => __DIR__ . '/..' . '/starkbank/ecdsa/src/ellipticcurve.php',
        '5ec26a44593cffc3089bdca7ce7a56c3' => __DIR__ . '/../..' . '/core/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'SendGrid\\Stats\\' => 15,
            'SendGrid\\Mail\\' => 14,
            'SendGrid\\Helper\\' => 16,
            'SendGrid\\EventWebhook\\' => 22,
            'SendGrid\\Contacts\\' => 18,
            'SendGrid\\' => 9,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'SendGrid\\Stats\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/stats',
        ),
        'SendGrid\\Mail\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail',
        ),
        'SendGrid\\Helper\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/helper',
        ),
        'SendGrid\\EventWebhook\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/eventwebhook',
        ),
        'SendGrid\\Contacts\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/contacts',
        ),
        'SendGrid\\' => 
        array (
            0 => __DIR__ . '/..' . '/sendgrid/php-http-client/lib',
        ),
    );

    public static $classMap = array (
        'AdminMiddleware' => __DIR__ . '/../..' . '/core/middleware/AdminMiddleware.php',
        'App\\Controllers\\AdminController' => __DIR__ . '/../..' . '/app/controllers/AdminController.php',
        'App\\Controllers\\ArticleController' => __DIR__ . '/../..' . '/app/controllers/ArticleController.php',
        'App\\Controllers\\BlogController' => __DIR__ . '/../..' . '/app/controllers/BlogController.php',
        'App\\Controllers\\CategoryController' => __DIR__ . '/../..' . '/app/controllers/CategoryController.php',
        'App\\Controllers\\RequestController' => __DIR__ . '/../..' . '/app/controllers/RequestController.php',
        'App\\Controllers\\UsersController' => __DIR__ . '/../..' . '/app/controllers/UsersController.php',
        'App\\Core\\App' => __DIR__ . '/../..' . '/core/App.php',
        'App\\Core\\Repository\\ArticleRepository' => __DIR__ . '/../..' . '/core/repositories/ArticleRepository.php',
        'App\\Core\\Repository\\CategoryRepository' => __DIR__ . '/../..' . '/core/repositories/CategoryRepository.php',
        'App\\Core\\Repository\\Connection' => __DIR__ . '/../..' . '/core/repositories/Connection.php',
        'App\\Core\\Repository\\RepositoryBuilder' => __DIR__ . '/../..' . '/core/repositories/RepositoryBuilder.php',
        'App\\Core\\Repository\\RequestRepository' => __DIR__ . '/../..' . '/core/repositories/RequestRepository.php',
        'App\\Core\\Repository\\UserRepository' => __DIR__ . '/../..' . '/core/repositories/UserRepository.php',
        'App\\Core\\Request' => __DIR__ . '/../..' . '/core/Requests/Request.php',
        'App\\Core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'ArticleRequest' => __DIR__ . '/../..' . '/core/Requests/ArticleRequest.php',
        'AuthMiddleware' => __DIR__ . '/../..' . '/core/middleware/AuthMiddleware.php',
        'BaseSendGridClientInterface' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/BaseSendGridClientInterface.php',
        'BlogRequest' => __DIR__ . '/../..' . '/core/Requests/BlogRequest.php',
        'CategoryRequest' => __DIR__ . '/../..' . '/core/Requests/CategoryRequest.php',
        'ComposerAutoloaderInit7c8f0a8154fcdea89657ac618ee8ac86' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit7c8f0a8154fcdea89657ac618ee8ac86' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'EllipticCurve\\Ecdsa' => __DIR__ . '/..' . '/starkbank/ecdsa/src/ecdsa.php',
        'EllipticCurve\\PrivateKey' => __DIR__ . '/..' . '/starkbank/ecdsa/src/privatekey.php',
        'EllipticCurve\\PublicKey' => __DIR__ . '/..' . '/starkbank/ecdsa/src/publickey.php',
        'EllipticCurve\\Signature' => __DIR__ . '/..' . '/starkbank/ecdsa/src/signature.php',
        'EllipticCurve\\Utils\\File' => __DIR__ . '/..' . '/starkbank/ecdsa/src/utils/file.php',
        'Image' => __DIR__ . '/../..' . '/Image.php',
        'RequestRequest' => __DIR__ . '/../..' . '/core/Requests/RequestRequest.php',
        'Requests' => __DIR__ . '/../..' . '/app/models/Request.php',
        'SendGrid' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/SendGrid.php',
        'SendGrid\\Client' => __DIR__ . '/..' . '/sendgrid/php-http-client/lib/Client.php',
        'SendGrid\\Contacts\\Recipient' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/contacts/Recipient.php',
        'SendGrid\\Contacts\\RecipientForm' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/contacts/RecipientForm.php',
        'SendGrid\\EventWebhook\\EventWebhook' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/eventwebhook/EventWebhook.php',
        'SendGrid\\EventWebhook\\EventWebhookHeader' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/eventwebhook/EventWebhookHeader.php',
        'SendGrid\\Exception\\InvalidRequest' => __DIR__ . '/..' . '/sendgrid/php-http-client/lib/Exception/InvalidRequest.php',
        'SendGrid\\Helper\\Assert' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/helper/Assert.php',
        'SendGrid\\Mail\\Asm' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Asm.php',
        'SendGrid\\Mail\\Attachment' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Attachment.php',
        'SendGrid\\Mail\\BatchId' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/BatchId.php',
        'SendGrid\\Mail\\Bcc' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Bcc.php',
        'SendGrid\\Mail\\BccSettings' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/BccSettings.php',
        'SendGrid\\Mail\\BypassListManagement' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/BypassListManagement.php',
        'SendGrid\\Mail\\Category' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Category.php',
        'SendGrid\\Mail\\Cc' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Cc.php',
        'SendGrid\\Mail\\ClickTracking' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/ClickTracking.php',
        'SendGrid\\Mail\\Content' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Content.php',
        'SendGrid\\Mail\\CustomArg' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/CustomArg.php',
        'SendGrid\\Mail\\EmailAddress' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/EmailAddress.php',
        'SendGrid\\Mail\\Footer' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Footer.php',
        'SendGrid\\Mail\\From' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/From.php',
        'SendGrid\\Mail\\Ganalytics' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Ganalytics.php',
        'SendGrid\\Mail\\GroupId' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/GroupId.php',
        'SendGrid\\Mail\\GroupsToDisplay' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/GroupsToDisplay.php',
        'SendGrid\\Mail\\Header' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Header.php',
        'SendGrid\\Mail\\HtmlContent' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/HtmlContent.php',
        'SendGrid\\Mail\\IpPoolName' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/IpPoolName.php',
        'SendGrid\\Mail\\Mail' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Mail.php',
        'SendGrid\\Mail\\MailSettings' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/MailSettings.php',
        'SendGrid\\Mail\\MimeType' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/MimeType.php',
        'SendGrid\\Mail\\OpenTracking' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/OpenTracking.php',
        'SendGrid\\Mail\\Personalization' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Personalization.php',
        'SendGrid\\Mail\\PlainTextContent' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/PlainTextContent.php',
        'SendGrid\\Mail\\ReplyTo' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/ReplyTo.php',
        'SendGrid\\Mail\\SandBoxMode' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/SandBoxMode.php',
        'SendGrid\\Mail\\Section' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Section.php',
        'SendGrid\\Mail\\SendAt' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/SendAt.php',
        'SendGrid\\Mail\\SpamCheck' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/SpamCheck.php',
        'SendGrid\\Mail\\Subject' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Subject.php',
        'SendGrid\\Mail\\SubscriptionTracking' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/SubscriptionTracking.php',
        'SendGrid\\Mail\\Substitution' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/Substitution.php',
        'SendGrid\\Mail\\TemplateId' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/TemplateId.php',
        'SendGrid\\Mail\\To' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/To.php',
        'SendGrid\\Mail\\TrackingSettings' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/TrackingSettings.php',
        'SendGrid\\Mail\\TypeException' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/mail/TypeException.php',
        'SendGrid\\Response' => __DIR__ . '/..' . '/sendgrid/php-http-client/lib/Response.php',
        'SendGrid\\Stats\\Stats' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/stats/Stats.php',
        'SendGrid\\Test\\ClientTest' => __DIR__ . '/..' . '/sendgrid/php-http-client/test/unit/ClientTest.php',
        'SendGrid\\Test\\FilesExistTest' => __DIR__ . '/..' . '/sendgrid/php-http-client/test/unit/FilesExistTest.php',
        'SendGrid\\Test\\LicenceYearTest' => __DIR__ . '/..' . '/sendgrid/php-http-client/test/unit/LicenceYearTest.php',
        'SendGrid\\Test\\MockClient' => __DIR__ . '/..' . '/sendgrid/php-http-client/test/unit/MockClient.php',
        'SendGrid\\Test\\ResponseTest' => __DIR__ . '/..' . '/sendgrid/php-http-client/test/unit/ResponseTest.php',
        'Slug' => __DIR__ . '/../..' . '/core/Slug.php',
        'TwilioEmail' => __DIR__ . '/..' . '/sendgrid/sendgrid/lib/TwilioEmail.php',
        'User' => __DIR__ . '/../..' . '/app/models/User.php',
        'UserRequest' => __DIR__ . '/../..' . '/core/Requests/UserRequest.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7c8f0a8154fcdea89657ac618ee8ac86::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7c8f0a8154fcdea89657ac618ee8ac86::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7c8f0a8154fcdea89657ac618ee8ac86::$classMap;

        }, null, ClassLoader::class);
    }
}
