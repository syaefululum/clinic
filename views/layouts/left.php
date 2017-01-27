<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Alexander Pierce</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],                    
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                    ['label' => 'Person', 'icon' => 'fa fa-users', 'url' => ['/person']],
                    ['label' => 'Unit', 'icon' => 'fa fa-list', 'url' => ['/unit']],
                    ['label' => 'Service', 'icon' => 'fa fa-list', 'url' => ['/service']],
//                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Administrator',
                        'icon' => 'fa fa-user',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Patient', 'icon' => 'fa fa-wheelchair', 'url' => ['/person']],
                            ['label' => 'Doctor', 'icon' => 'fa fa-user-md', 'url' => ['/doctor']],
                            ['label' => 'Nurse', 'icon' => 'fa fa-user-md', 'url' => ['/nurse']],
                            ['label' => 'Medicine', 'icon' => 'fa fa-medkit', 'url' => ['/medicine'],],
                            ['label' => 'Supplier', 'icon' => 'fa fa-exchange', 'url' => ['/purchase-header'],],
                            ['label' => 'Purchasing', 'icon' => 'fa fa-exchange', 'url' => ['/purchase-header'],],
                            ['label' => 'Order', 'icon' => 'fa fa-exchange', 'url' => ['/order-header'],],
                        ],
                    ],
                    [
                        'label' => 'Doctor',
                        'icon' => 'fa fa-user-md',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Medical Record', 'icon' => 'fa fa-medkit', 'url' => ['/medical-record'],],
                            ['label' => 'Schedule', 'icon' => 'fa fa-calendar', 'url' => ['/schedule'],],
                        ],
                    ],
                    [
                        'label' => 'Nurse',
                        'icon' => 'fa fa-user-md',
                        'url' => '#',
                        'items' => [                            
                            ['label' => 'Complaint', 'icon' => 'fa fa-medkit', 'url' => ['/complaint-header'],],
                            ['label' => 'Prescription', 'icon' => 'fa fa-medkit', 'url' => ['/prescription-header'],],
                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
