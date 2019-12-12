<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned()->index();
            $table->bigInteger('brand_id')->unsigned()->index();
            $table->string('name');
            $table->string('url');
            $table->string('description');
            $table->string('created_at_ip',45)->nullable();
            $table->string('updated_at_ip',45)->nullable();
            $table->bigInteger('comment_ID')->unsigned();
            $table->bigInteger('comment_post_ID')->unsigned()->default(0)->index('comment_post_ID');
            $table->text('comment_author');
            $table->string('comment_author_email', 100)->default('')->index('comment_author_email');
            $table->string('comment_author_url', 200)->default('');
            $table->string('comment_author_IP', 100)->default('');
            $table->dateTime('comment_date');
            $table->dateTime('comment_date_gmt')->index('comment_date_gmt');
            $table->text('comment_content', 65535);
            $table->integer('comment_karma')->default(0);
            $table->string('comment_approved', 20)->default('1');
            $table->string('comment_agent')->default('');
            $table->string('comment_type', 20)->default('');
            $table->bigInteger('comment_parent')->unsigned()->default(0)->index('comment_parent');
            $table->bigInteger('user_id')->unsigned()->default(0);
            $table->string('link_url')->default('');
            $table->string('link_name')->default('');
            $table->string('link_image')->default('');
            $table->string('link_target', 25)->default('');
            $table->string('link_description')->default('');
            $table->string('link_visible', 20)->default('Y')->index('link_visible');
            $table->bigInteger('link_owner')->unsigned()->default(1);
            $table->integer('link_rating')->default(0);
            $table->dateTime('link_updated');
            $table->string('link_rel')->default('');
            $table->text('link_notes', 16777215);
            $table->string('link_rss')->default('');
            $table->string('meta_key')->nullable()->index('meta_key');
            $table->text('meta_value')->nullable();
            $table->bigInteger('post_author')->unsigned()->default(0)->index('post_author');
            $table->dateTime('post_date');
            $table->dateTime('post_date_gmt');
            $table->text('post_content');
            $table->text('post_title', 65535);
            $table->text('post_excerpt', 65535);
            $table->string('post_status', 20)->default('publish');
            $table->string('comment_status', 20)->default('open');
            $table->string('ping_status', 20)->default('open');
            $table->string('post_password', 20)->default('');
            $table->string('post_name', 200)->default('')->index('post_name');
            $table->text('to_ping', 65535);
            $table->text('pinged', 65535);
            $table->dateTime('post_modified');
            $table->dateTime('post_modified_gmt');
            $table->text('post_content_filtered');
            $table->bigInteger('post_parent')->unsigned()->default(0)->index('post_parent');
            $table->string('guid')->default('');
            $table->integer('menu_order')->default(0);
            $table->string('post_type', 20)->default('post');
            $table->string('post_mime_type', 100)->default('');
            $table->bigInteger('term_id')->unsigned()->default(0);
            $table->string('taxonomy', 32)->default('')->index('taxonomy');
            $table->bigInteger('parent')->unsigned()->default(0);
            $table->bigInteger('count')->default(0);
            $table->string('user_login', 60)->default('')->index('user_login_key');
            $table->string('user_pass', 64)->default('');
            $table->string('user_nicename', 50)->default('')->index('user_nicename');
            $table->string('user_email', 100)->default('');
            $table->string('user_url', 100)->default('');
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
        Schema::dropIfExists('tests');
    }
}
