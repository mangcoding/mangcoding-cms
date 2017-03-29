<?php

use Illuminate\Database\Seeder;
use App\Widget;

class WidgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Widget = new Widget;
        $Widget::create(['widgetName' =>'youtube','title_en'=>'Featured Video','title_id'=>'Video utama','widgetValue'=>'<iframe width="360" height="240" src="https://www.youtube.com/embed/pXRviuL6vMY" frameborder="0" allowfullscreen></iframe>','status'=>'1']);

        $Widget::create(['widgetName' =>'twitter','title_en'=>'Follow Us','title_id'=>'Follow Kami','widgetValue'=>'<a class="twitter-timeline" href="https://twitter.com/Dot_rocK" data-widget-id="251218223188557824">Tweets by @mangcoding</a>
			<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?\'http\':\'https\';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>','status'=>'1']);
    }
}
