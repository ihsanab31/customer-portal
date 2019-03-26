

<?php

$this->title = 'Belleza Lifescape';
?>
<div class="home-index">

    <div class="body-content" style="margin-top: 10%">

        <div class="row">
            <div class="col-lg-6">
                <div class="row">
                    <div id="carousel">
                        <carousel-3d :autoplay="true" :autoplay-timeout="2000">
                            <slide :index="0"><img src="<?= Yii::$app->request->hostInfo.'/img/what-is-internet-of-things-400x300.jpg'; ?>" /></slide>
                            <slide :index="1"><img src="<?= Yii::$app->request->hostInfo.'/img/shutterstock_66030619_opt.jpg'; ?>"/></slide>
                            <slide :index="2"><img src="<?= Yii::$app->request->hostInfo.'/img/CSE1704_POY_Trane_Tracer_Ensemble.jpg'; ?>"/></slide>
                        </carousel-3d>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <p style=" position: relative; margin-top: 15%; font-family: Yanone Kaffeesatz, sans-serif; font-size: 200%; text-align: center"><i>"Our building management system, make your life easier".</i></p>
                <p style=" position: relative; margin-top: 1%; margin-left: 7%; font-family: Yanone Kaffeesatz, sans-serif; font-size: 115%; text-align: justify">
                    With our building management system, you no longer have to spend time on matters related to your apartment.
                    It's simple, it's fast, it's easy. All you have to do is create your own account, and enjoy the convenience.
                </p>
            </div>
        </div>

    </div>
</div>

