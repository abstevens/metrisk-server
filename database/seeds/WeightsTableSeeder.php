<?php

use Illuminate\Database\Seeder;
use \App\Models\Option;
use \App\Models\Weight;
use \App\Models\Category;
use App\Models\User;
use \Database\Traits\AdminRights;

class WeightsTableSeeder extends Seeder
{
    use AdminRights;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoryId = $this->getAdminId(Category::class, 'title', 'Risk');
        $userId = $this->getAdminId(User::class, 'email', 'testing@example.com');

        $options = Option::pluck('id');

        $options->each(function ($option) use ($categoryId, $userId) {
            factory(Weight::class)->create([
                'option_id' => $option,
                'category_id' => $categoryId,
                'author_id' => $userId,
            ]);
        });
    }
}
