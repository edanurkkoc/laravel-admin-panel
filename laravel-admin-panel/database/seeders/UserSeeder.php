<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role=Role::updateOrCreate(

            [
                'name'=>'yonetici',
            ],
            [
                'name'=>'yonetici',
                'title'=>'Yönetici',
                'description'=>'Sitenin genel yönetimini sağlar',
            ]
        );
        $roleBlog=Role::updateOrCreate(

            [
                'name'=>'blog-yoneticisi',
            ],
            [
                'name'=>'blog-yoneticisi',
                'title'=>'Blog Yönetici',
                'description'=>'Blog yönetimini sağlar',
            ]
        );
        $roleECommerce=Role::updateOrCreate(

            [
                'name'=>'e-ticaret-yoneticisi',
            ],
            [
                'name'=>'e-ticaret-yoneticisi',
                'title'=>'E-Ticaret Yönetici',
                'description'=>'E-Ticaret yönetimini sağlar',
            ]
        );
            $permissions['blog-yoneticisi']=[
                [
                    'title'=>'Yazıları Görüntüleyebilir',
                    'description'=>'Tüm yazıları görüntüleyebilir',
                ],
                [
                    'title'=>'Yazıları Düzenleyebilir',
                    'description'=>'Tüm yazıları düzenleyebilir',
                ],
                [
                    'title'=>'Yazı Kategorilerini Görüntüleyebilir',
                    'description'=>'Tüm Yazı kategorilerini görüntüleyebilir',
                ],
                [
                    'title'=>'Yazı Kategorilerini Düzenleyebilir',
                    'description'=>'Tüm Yazı kategorilerini düzenleyebilir',
                ],
            ];
            $permissions['e-ticaret-yoneticisi']=[
                [
                    'title'=>'Siparişleri Görüntüleyebilir',
                    'description'=>'Tüm siparişleri görüntüleyebilir',
                ],
                [
                    'title'=>'Siparişleri Düzenleyebilir',
                    'description'=>'Tüm siparişleri düzenleyebilir',
                ],
                [
                    'title'=>'Ürünleri  Görüntüleyebilir',
                    'description'=>'Tüm ürünleri görüntüleyebilir',
                ],
                [
                    'title'=>' Ürünleri Düzenleyebilir',
                    'description'=>'Tüm ürünleri düzenleyebilir',
                ],
            ];

            foreach($permissions as $key=>$permission){
                $role=Role::where('name',$key)->first();

                foreach($permission as $p){
                    $newpermission=Permission::updateOrCreate(
                    ['name'=>Str::slug($p['title'])],
                    [
                        'name'=>Str::slug($p['title']),
                        'title'=>$p['title'],
                        'description'=>$p['description'],
                    ]
                    );
                    $role->givePermissionTo($newpermission);
                }
            }





        $user=User::updateOrCreate(
            [
                'email'=>'edanurkocakoc@gmail.com',
            ]
            ,[
                'name'=>'Eda',
                'email'=>'edanurkocakoc@gmail.com',
                'password'=>bcrypt('123456'),
            ]
            );

        $user->assignRole($role);
      
       if(User::count()==1){
           $users=User::factory(100)->create();
           foreach($users as $user){
               $user->assignRole(rand(0,1) == 1 ? $roleBlog :$roleECommerce);
           }
       }
      
    }
}

