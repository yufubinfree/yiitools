{php}

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
{/php}
{php} $this->beginPage() {/php}
<!DOCTYPE html>
<html lang="{php} echo Yii::$app->language {/php}">
<head>
    <meta charset="{php} echo Yii::$app->charset {/php}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {php} echo Html::csrfMetaTags() {/php}
    <title>{php} echo Html::encode($this->title) {/php}</title>
    {php} $this->head() {/php}
</head>
<body>
{php} $this->beginBody() {/php}

<div class="wrap">
    {php}
    NavBar::begin([
        'brandLabel' => 'My Company',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    {/php}

    <div class="container">
        {php} echo Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) {/php}
        {php} echo $content {/php}
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company {php} echo date('Y') {/php}</p>

        <p class="pull-right">{php} echo Yii::powered() {/php}</p>
    </div>
</footer>

{php} $this->endBody() {/php}
</body>
</html>
{php} $this->endPage() {/php}
