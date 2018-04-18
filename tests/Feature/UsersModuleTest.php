<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use Illuminate\Support\Facades\DB;

// PRUEVAS AUTOMATICAS PARA NUESTRA APLICACION

class UsersModuleTest extends TestCase
{

    use RefreshDatabase; // para que se ejecuten todas las migraciones en esta base de datos de prueba, y cada prueba se ejecute dentro de una transaccion para evitar que una prueba afecte a la otra

    /** 
    	@test
    */
   	public function it_shows_the_user_list_page(){

        // el segundo lo creara aleatorio pero con la profesion por defecto con id 1
        factory(User::class)->create([

            'name' => 'carlos',
        ]);

        // el segundo lo creara aleatorio pero con la profesion por defecto con id 1
        factory(User::class)->create([

            'name' => 'maria',
        ]);

    	// Con esto comprobamos que funciona correctameente -----(200)
    	// con esto mostramos el texto de la pagina generada ....('usuarios')
        $this->get('admin/usuarios')->assertStatus(200)->assertSee('Listado de usuarios')->assertSee('carlos')->assertSee('maria');
    }

    /** 
        @test
    */
    public function it_shows_default_message_if_there_are_no_users(){

        //DB::table('users')->truncate();

        $this->get('admin/usuarios')->assertStatus(200)->assertSee('No hay usuarios registrados');
    }

    /** 
    	@test
    */
    public function it_display_the_user_details(){

        // creamos el usuario con factory
        $user = factory(User::class)->create([

            'name' => 'carlos garcia',
        ]);

    	$this->get('/admin/usuarios/'.$user->id)->assertStatus(200)->assertSee('carlos garcia');
    }

    /** 
        @test
    */
    public function it_display_a_404_if_the_user_is_not_found(){

        $this->get('/admin/usuarios/999')->assertStatus(404)->assertSee('Página no encontrada');

    }

    /** 
    	@test
    */
    public function it_loads_the_new_user_page(){

    	$this->get('/admin/usuarios/nuevo')->assertStatus(200)->assertSee('Crear usuarios');
    }

    /** 
    	@test
    
    public function it_loads_the_edit_num_user_page(){

    	$this->get('/usuarios/5/editar')->assertStatus(200)->assertSee('Editar');
    }*/

    /** 
    	@test
    
    public function it_loads_the_edit_text_user_page(){

    	$this->get('/usuarios/texto/edit')->assertStatus(200)->assertSee('El texto texto no es correcto, debe introducir un numero');
    }*/

    /** 
        @test
    */
    public function it_creates_a_new_user(){

        $this->withoutExceptionHandling();
        
        $this->post('admin/usuarios/', [

            'name' => 'Carlos Garcia',
            'email' => 'ejemplo@ejemplo.com',
            'password' => '123456',

        ])->assertRedirect(route('users.index'));

       /* para el metodo post utilizaremos este metodo 
       $this->assertDatabaseHas('users', [

            'name' => 'Carlos Garcia',
            'email' => 'ejemplo@ejemplo.com',
            'password' => '123456',
        ]);*/

        $this->assertCredentials([ // necesitamos este metodo para comprobar que el usuario se guardo con la contraseñan correcta, por que volverla a encriptar no valdria ya que nos daria error, por que cada vez que usamos el metodo bcrypt hace una nueva cadena de texto

            'name' => 'Carlos Garcia',
            'email' => 'ejemplo@ejemplo.com',
            'password' => '123456',
        ]);
    }

    /** 
        @test
    */
    public function the_name_is_required_when_updating_a_user(){

        //$this->withoutExceptionHandling(); usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $user = factory(User::class)->create();

        $this->from("admin/usuarios/{$user->id}/editar")
                ->put("admin/usuarios/{$user->id}", [

                'name' => '',
                'email' => 'ejemplo@ejemplo.com',
                'password' => '123456',

            ])
            ->assertRedirect("admin/usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['name']);

        //$this->assertEquals(0, User::count());

        $this->assertDatabaseMissing('users', [

            'email' => 'ejemplo@ejemplo.com',
        ]);
    }

    /** 
        @test
    */
    public function the_email_is_required(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $this->from('admin/usuarios/nuevo')
            ->post('admin/usuarios/', [

                'name' => 'Carlos Garcia',
                'email' => '',
                'password' => '123456',

            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email' => 'El campo email es obligatorio']);

        $this->assertEquals(0, User::count());

        /*$this->assertDatabaseMissing('users', [

            'email' => 'ejemplo@ejemplo.com',
        ]);*/
    }

    /** 
        @test
    */
    public function the_email_must_be_valid(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $this->from('admin/usuarios/nuevo')
            ->post('admin/usuarios/', [

                'name' => 'Carlos Garcia',
                'email' => 'Correo_no_valido',
                'password' => '123456',

            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email' => 'Tiene que escribir un email correcto (ejemplo@ejemplo.com)']);

        $this->assertEquals(0, User::count());

        /*$this->assertDatabaseMissing('users', [

            'email' => 'ejemplo@ejemplo.com',
        ]);*/
    }

    /** 
        @test
    */
    public function the_email_must_be_unique(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        factory(User::class)->create([

            'email' => 'ejemplo@ejemplo.com',
        ]);

        $this->from('admin/usuarios/nuevo')
            ->post('admin/usuarios/', [

                'name' => 'Carlos Garcia',
                'email' => 'ejemplo@ejemplo.com',
                'password' => '123456',

            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['email' => 'Este email ya existe en la base de datos, introduzca uno diferente']);

        $this->assertEquals(1, User::count());

        /*$this->assertDatabaseMissing('users', [

            'email' => 'ejemplo@ejemplo.com',
        ]);*/
    }

    /** 
        @test
    */
    public function the_password_is_required(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $this->from('admin/usuarios/nuevo')
            ->post('admin/usuarios/', [

                'name' => 'Carlos Garcia',
                'email' => 'ejemplo@ejemplo.com',
                'password' => '',

            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['password' => 'El campo password es obligatorio']);

        $this->assertEquals(0, User::count());

        /*$this->assertDatabaseMissing('users', [

            'email' => 'ejemplo@ejemplo.com',
        ]);*/
    }

    /** 
        @test
    */
    public function the_password_must_not_be_min6(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $this->from('admin/usuarios/nuevo')
            ->post('admin/usuarios/', [

                'name' => 'Carlos Garcia',
                'email' => 'ejemplo@ejemplo.com',
                'password' => '12345',

            ])
            ->assertRedirect(route('users.create'))
            ->assertSessionHasErrors(['password' => 'La contraseña debe de tener mas de 6 caracteres']);

        $this->assertEquals(0, User::count());

        /*$this->assertDatabaseMissing('users', [

            'email' => 'ejemplo@ejemplo.com',
        ]);*/
    }

    /** 
        @test
    */
    public function it_loads_the_edit_user_page(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();

        $this->get("admin/usuarios/{$user->id}/editar", ['id'=> "user->id"])
        ->assertStatus(200)
        ->assertViewIs('users.edit')
        ->assertSee('Editar usuario')
        ->assertViewHas('user', function($viewUser) use ($user){

            return $viewUser->id === $user->id;
        });
    }

    /** 
        @test
    */
    public function it_updates_a_user(){

        $this->withoutExceptionHandling();

        $user = factory(User::class)->create();
        
        $this->put("admin/usuarios/{$user->id}", [

            'name' => 'Carlos Garcia',
            'email' => 'ejemplo@ejemplo.com',
            'password' => '123456',

        ])->assertRedirect("admin/usuarios/{$user->id}");

       /* para el metodo post utilizaremos este metodo 
       $this->assertDatabaseHas('users', [

            'name' => 'Carlos Garcia',
            'email' => 'ejemplo@ejemplo.com',
            'password' => '123456',
        ]);*/

        $this->assertCredentials([ // necesitamos este metodo para comprobar que el usuario se guardo con la contraseñan correcta, por que volverla a encriptar no valdria ya que nos daria error, por que cada vez que usamos el metodo bcrypt hace una nueva cadena de texto

            'name' => 'Carlos Garcia',
            'email' => 'ejemplo@ejemplo.com',
            'password' => '123456',
        ]);
    }


    ///////////////////////////////////////////////////////////////////77

    /** 
        @test
    */
    public function the_email_must_be_valid_when_updating_the_user(){

        //$this->withoutExceptionHandling(); usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $user = factory(User::class)->create();

        $this->from("admin/usuarios/{$user->id}/editar")
                ->put("admin/usuarios/{$user->id}", [

                'name' => 'Carlos Garcia',
                'email' => 'correo-no-valido',
                'password' => '123456',

            ])
            ->assertRedirect("admin/usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);

        //$this->assertEquals(0, User::count());

        $this->assertDatabaseMissing('users', [

            'name' => 'Carlos Garcia',
        ]);
    }

    /** 
        @test
    */
    public function the_email_must_be_unique_when_updating_the_user(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        factory(User::class)->create([

            'email' => 'existing-email@example.com'
        ]);

        $user = factory(User::class)->create([

            'email' => 'ejemplo@ejemplo.com',
        ]);

        $this->from("admin/usuarios/{$user->id}/editar")
            ->put("admin/usuarios/{$user->id}", [

                'name' => 'Carlos Garcia',
                'email' => 'existing-email@example.com',
                'password' => '123456',

            ])
            ->assertRedirect("admin/usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['email']);


        /*$this->assertDatabaseMissing('users', [

            'email' => 'ejemplo@ejemplo.com',
        ]);*/
    }

    /** 
        @test
    */
    public function the_password_is_stay_the_same_when_updating_the_user(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $user = factory(User::class)->create([

            'email' => 'ejemplo@ejemplo.com'
        ]);

        $this->from("admin/usuarios/{$user->id}/editar")
            ->put("admin/usuarios/{$user->id}", [
                
                'name' => 'Carlos Garcia Prieto',
                'email' => 'ejemplo@ejemplo.com',
                'password' => '12345678'
            ])->assertRedirect("admin/usuarios/{$user->id}");


        $this->assertDatabaseHas('users', [

            'name' => 'Carlos Garcia Prieto',
            'email' => 'ejemplo@ejemplo.com',
        ]);
    }

    /** 
        @test
    */
    public function the_password_is_optional_when_updating_the_user(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $oldPassword = 'CLAVE_ANTERIOR';

        $user = factory(User::class)->create([

            'password' => bcrypt($oldPassword)
        ]);

        $this->from("admin/usuarios/{$user->id}/editar")
            ->put("admin/usuarios/{$user->id}", [
                
                'name' => 'Carlos Garcia',
                'email' => 'ejemplo@ejemplo.com',
                'password' => ''

            ])->assertRedirect("admin/usuarios/{$user->id}");

        $this->assertCredentials([

            'name' => 'Carlos Garcia',
            'email' => 'ejemplo@ejemplo.com',
            'password' => $oldPassword
        ]);
    }

    /** 
        @test
    */
    /*public function the_password_must_not_be_min6_when_updating_the_user(){

        //$this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $user = factory(User::class)->create();

        $this->from("/usuarios/{$user->id}/editar")
            ->put("/usuarios/{$user->id}", [

                'name' => 'Carlos Garcia',
                'email' => 'ejemplo@ejemplo.com',
                'password' => '12345',

            ])
            ->assertRedirect("/usuarios/{$user->id}/editar")
            ->assertSessionHasErrors(['password']);

        $this->assertEquals(1, User::count());

        $this->assertDatabaseMissing('users', [

            'email' => 'ejemplo@ejemplo.com',
        ]);
    }*/

    ///////////////// DELETEEE////////////////////////////////
    /** 
        @test
    */
    public function it_deletes_a_user(){

        $this->withoutExceptionHandling(); //usando validate ya no necesitamos esta manejador de exceciones, solo tenemos que comprobar que este activado, este manejador de excepciones va a estar activado en mi aplicacion, pero tambien necesito que este activado dentro de la prueba

        $user = factory(User::class)->create();

        $this->delete("admin/usuarios/{$user->id}")
            ->assertRedirect('admin/usuarios');


        $this->assertDatabaseMissing('users', [

            'id' => $user->id
        ]);

        //$this->assertSame(0, User::count());

    }
}
