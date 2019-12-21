<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hd', function (Blueprint $table) {
            /*
             * 使用phpartisan命令创建数据迁移
             * php artisan make:migration create_hd_table --create=hd
             * 创建好的文件默认在database/migrations下
             * 执行php artisan migrate来运行未完成的迁移
            */
            $table->increments('id');//主键
            $table->timestamps();//数据更新或者创建的时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hd');
    }
}
