<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('brand_id')->default(0)->comment('品牌ID');
            $table->unsignedInteger('class_id')->default(0)->comment('栏目ID');
            $table->unsignedInteger('store_id')->default(0)->comment('商家ID');
            $table->string('goods_name',120)->default('')->comment('商品名称');
            $table->string('goods_subname',120)->default('')->comment('商品副标题');
            $table->string('goods_no',30)->default('')->comment('商品编号');
            $table->text('goods_images')->default('')->comment('商品图片');
            $table->string('goods_master_image')->default('')->comment('主图');
            $table->unsignedDecimal('goods_price',9,2)->default(0.00)->comment('商品价格');
            $table->unsignedDecimal('goods_market_price',9,2)->default(0.00)->comment('市场价格');
            $table->unsignedInteger('goods_stock')->default(0)->comment('库存');
            $table->unsignedDecimal('goods_weight',9,2)->default(0)->comment('商品重量');
            $table->unsignedInteger('goods_sale')->default(0)->comment('销售量');
            $table->unsignedInteger('goods_collect')->default(0)->comment('收藏量');
            $table->unsignedTinyInteger('goods_status')->default(0)->comment('上架状态');
            $table->unsignedTinyInteger('goods_verify')->default(0)->comment('审核状态');
            $table->text('goods_content')->default('')->comment('详情');
            $table->text('goods_content_mobile')->default('')->comment('手机端详情');
            $table->text('goods_attr')->default('')->comment('属性信息');
            $table->unsignedTinyInteger('is_recommend')->default(0)->comment('是否推荐商家首页');
            $table->unsignedTinyInteger('is_matser')->default(0)->comment('是否推荐主站首页');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}