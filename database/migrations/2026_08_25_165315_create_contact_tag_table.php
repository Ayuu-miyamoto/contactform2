<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contact_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id') 
                ->constrained('contacts') //contactsのidを参照する
                ->onDelete('cascade'); // 参照先が消されたら一緒に削除される設定
            
            $table->foreignId('tag_id')
                ->constrained('tags')
                ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['contact_id', 'tag_id']); // contact_idとtag_idの組み合わせを重複させないための設定
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_tag');
    }
};
