<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('add-services', function (User $user) {

            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'add_services') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('edit-services', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_services') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('view-services', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_services') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('destroy-services', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_services') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('services', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'services') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        Gate::define('add-locations', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {

                if ($value->name === 'create_locations') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('edit-locations', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_locations') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('view-locations', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_locations') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('destroy-locations', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_locations') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('locations', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'locations') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });


        Gate::define('add-amenities', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_amenities') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('edit-amenities', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_amenities') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('view-amenities', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_amenities') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('destroy-amenities', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_amenities') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('amenities', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'amenities') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        //                        --------------

        Gate::define('add-testimonials', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_testimonials') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('edit-testimonials', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_testimonials') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('view-testimonials', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_testimonials') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('destroy-testimonials', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_testimonials') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('testimonials', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'testimonials') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        Gate::define('add-faqs', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_faqs') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('edit-faqs', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_faqs') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('view-faqs', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_faqs') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('destroy-faqs', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_faqs') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('faqs', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'faqs') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });


        Gate::define('add-abouts', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_abouts') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('edit-abouts', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_abouts') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('view-abouts', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_abouts') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('destroy-abouts', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_abouts') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('abouts', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'abouts') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        Gate::define('add-home', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_home') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('edit-home', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_home') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('view-home', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_home') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('destroy-home', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_home') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('home', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'home') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        Gate::define('add-why', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_why') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('edit-why', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_why') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('view-why', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_why') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('destroy-why', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_why') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('why', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'why') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });

        Gate::define('edit-privacy', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_privacy') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('privacy', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'privacy') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('view-privacy', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_privacy') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('edit-terms', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_terms') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('terms', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'terms') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        Gate::define('view-terms', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_terms') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        Gate::define('view-jobs', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_jobs') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('jobs', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'jobs') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });

        Gate::define('view-contact', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_contact') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('contact', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'contact') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('view-inquiry', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_inquiry') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('inquiry', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'inquiry') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });

        Gate::define('add-admins', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_admins') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('edit-admins', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_admins') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });

        Gate::define('destroy-admins', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_admins') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('admins', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'admins') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('add-roles', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_roles') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('edit-roles', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'edit_roles') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('destroy-roles', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_roles') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('view-roles', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'view_roles') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('roles', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'roles') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
        });
        Gate::define('add-title', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'create_title') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('destroy-title', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_title') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
        Gate::define('destroy-job', function (User $user) {
            foreach ($user->role->permissions as $key => $value) {
                if ($value->name === 'destroy_job') {
                    $check = true;
                    break;
                } else {
                    $check = false;
                }
            }
            return $check;
            // return $user->permissions() === $post->user_id;
        });
    }
}
