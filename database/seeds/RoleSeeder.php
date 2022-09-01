<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create([
            'name' => 'Admin',
        ]);

        $role2 = Role::create([
            'name' => 'Vendedor',
        ]);


        //Users
        Permission::create([
            'action'        => 'Navegar usuarios',
            'name'          => 'users.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ])->syncRoles($role1);

        Permission::create([
            'action'        => 'Creación de usuarios',
            'name'          => 'users.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ])->syncRoles($role1);

        Permission::create([
            'action'        => 'Ver detalle de usuario',
            'name'          => 'users.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ])->syncRoles($role1);

        Permission::create([
            'action'        => 'Edición de usuarios',
            'name'          => 'users.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ])->syncRoles($role1);

        Permission::create([
            'action'        => 'Eliminar usuario',
            'name'          => 'users.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ])->syncRoles($role1);


        //Roles
        Permission::create([
            'action'        => 'Navegar roles',
            'name'          => 'roles.index',
            'description'   => 'Lista y navega todos los roles del sistema',
        ])->syncRoles($role1);

        Permission::create([
            'action'        => 'Ver detalle de un rol',
            'name'          => 'roles.show',
            'description'   => 'Ve en detalle cada rol del sistema',            
        ])->syncRoles($role1);

        Permission::create([
            'action'        => 'Creación de roles',
            'name'          => 'roles.create',
            'description'   => 'Podría crear nuevos roles en el sistema',
        ])->syncRoles($role1);

        Permission::create([
            'action'        => 'Edición de roles',
            'name'          => 'roles.edit',
            'description'   => 'Podría editar cualquier dato de un rol del sistema',
        ])->syncRoles($role1);

        Permission::create([
            'action'        => 'Eliminar roles',
            'name'          => 'roles.destroy',
            'description'   => 'Podría eliminar cualquier rol del sistema',      
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Navegar categorías',
           'name'          =>'categories.index',
           'description'   =>'Lista y navega por todos los categorías del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Ver detalle de categoría',
           'name'          =>'categories.show',
           'description'   =>'Ver en detalle cada categoría del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Edición de categorías',
           'name'          =>'categories.edit',
           'description'   =>'Editar cualquier dato de un categoría del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Creación de categorías',
           'name'          =>'categories.create',
           'description'   =>'Crea cualquier dato de una categoría del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Eliminar categorías',
           'name'          =>'categories.destroy',
           'description'   =>'Eliminar cualquier dato de una categoría del sistema.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Navegar por clientes',
           'name'          =>'clients.index',
           'description'   =>'Lista y navega por todos los clientes del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Ver detalle de cliente',
           'name'          =>'clients.show',
           'description'   =>'Ver en detalle cada cliente del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Edición de clientes',
           'name'          =>'clients.edit',
           'description'   =>'Editar cualquier dato de un cliente del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Creación de clientes',
           'name'          =>'clients.create',
           'description'   =>'Crea cualquier dato de un cliente del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Eliminar clientes',
           'name'          =>'clients.destroy',
           'description'   =>'Eliminar cualquier dato de un cliente del sistema.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Navegar por productos',
           'name'          =>'products.index',
           'description'   =>'Lista y navega por todos los productos del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Ver detalle de producto',
           'name'          =>'products.show',
           'description'   =>'Ver en detalle cada producto del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Edición de productos',
           'name'          =>'products.edit',
           'description'   =>'Editar cualquier dato de un producto del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Creación de productos',
           'name'          =>'products.create',
           'description'   =>'Crea cualquier dato de un producto del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Eliminar productos',
           'name'          =>'products.destroy',
           'description'   =>'Eliminar cualquier dato de un producto del sistema.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Navegar por proveedores',
           'name'          =>'providers.index',
           'description'   =>'Lista y navega por todos los proveedores del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Ver detalle de proveedor',
           'name'          =>'providers.show',
           'description'   =>'Ver en detalle cada proveedor del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Edición de proveedores',
           'name'          =>'providers.edit',
           'description'   =>'Editar cualquier dato de un proveedor del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Creación de proveedores',
           'name'          =>'providers.create',
           'description'   =>'Crea cualquier dato de un proveedor del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Eliminar proveedores',
           'name'          =>'providers.destroy',
           'description'   =>'Eliminar cualquier dato de un proveedor del sistema.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Navegar por compras',
           'name'          =>'purchases.index',
           'description'   =>'Lista y navega por todos los compras del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Ver detalle de compra',
           'name'          =>'purchases.show',
           'description'   =>'Ver en detalle cada compra del sistema.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Creación de compras',
           'name'          =>'purchases.create',
           'description'   =>'Crea cualquier dato de un compra del sistema.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Navegar por ventas',
           'name'          =>'sales.index',
           'description'   =>'Lista y navega por todos los ventas del sistema.',
        ])->syncRoles([$role1, $role2]);
        Permission::create([
           'action'        =>'Ver detalle de venta',
           'name'          =>'sales.show',
           'description'   =>'Ver en detalle cada venta del sistema.',
        ])->syncRoles([$role1, $role2]);
        Permission::create([
           'action'        =>'Creación de ventas',
           'name'          =>'sales.create',
           'description'   =>'Crea cualquier dato de un venta del sistema.',
        ])->syncRoles([$role1, $role2]);

        Permission::create([
           'action'        =>'Descargar PDF reporte de compras',
           'name'          =>'purchases.pdf',
           'description'   =>'Puede descargar todos los reportes de las compras en PDF.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Descargar PDF reporte de ventas',
           'name'          =>'sales.pdf',
           'description'   =>'Puede descargar todos los reportes de las ventas en PDF.',
        ])->syncRoles([$role1, $role2]);

        Permission::create([
           'action'        =>'Imprimir boleta de venta',
           'name'          =>'sales.print',
           'description'   =>'Puede imprimir boletas de todas las ventas.',
        ])->syncRoles([$role1, $role2]);

        Permission::create([
           'action'        =>'Ver datos de la empresa',
           'name'          =>'businesses.index',
           'description'   =>'Navega por los datos de la empresa.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Edición de empresa',
           'name'          =>'businesses.edit',
           'description'   =>'Editar cualquier dato de la empresa.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'er datos de la impresora',
           'name'          =>'printers.index',
           'description'   =>'Navega por los datos de la impresora.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Edición de impresora',
           'name'          =>'printers.edit',
           'description'   =>'Editar cualquier dato de la impresora.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Subir archivo de compra',
           'name'          =>'upload.purchases',
           'description'   =>'Puede subir comprobantes de una compra.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Cambiar estado de producto',
           'name'          =>'change.status.products',
           'description'   =>'Permite cambiar el estado de un producto.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Cambiar estado de compra',
           'name'          =>'change.status.purchases',
           'description'   =>'Permite cambiar el estado de un compra.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Cambiar estado de venta',
           'name'          =>'change.status.sales',
           'description'   =>'Permite cambiar el estado de un venta.',
        ])->syncRoles($role1);

        Permission::create([
           'action'        =>'Reporte por día',
           'name'          =>'reports.day',
           'description'   =>'Permite ver los reportes de ventas por día.',
        ])->syncRoles($role1);
        Permission::create([
           'action'        =>'Reporte por fechas',
           'name'          =>'reports.date',
           'description'   =>'Permite ver los reportes por un rango de fechas de las ventas.',
        ])->syncRoles($role1);
        Permission::create([
            'action'        =>'Tasa del día',
            'name'          =>'exchanges.index',
            'description'   =>'Permite ver la lista de las tasas ó intercambios creadas.',
         ])->syncRoles($role1);
         Permission::create([
            'action'        =>'Extablecer tasa del día',
            'name'          =>'exchanges.create',
            'description'   =>'Permite establecer que tasa ó intercambios va a tener presente el sistema.',
         ])->syncRoles($role1);
         Permission::create([
            'action'        => 'Navegar libro contable',
            'name'          => 'contabilities.index',
            'description'   => 'Lista y navega todos los usuarios del sistema',
        ])->syncRoles($role1);
        Permission::create([
            'action'        => 'Creación de libro contable',
            'name'          => 'contabilities.create',
            'description'   => 'Podría crear nuevos usuarios en el sistema',
        ])->syncRoles($role1);
        Permission::create([
            'action'        => 'Ver detalle de libro contable',
            'name'          => 'contabilities.show',
            'description'   => 'Ve en detalle cada usuario del sistema',            
        ])->syncRoles($role1);
        Permission::create([
            'action'        => 'Edición de libro contable',
            'name'          => 'contabilities.edit',
            'description'   => 'Podría editar cualquier dato de un usuario del sistema',
        ])->syncRoles($role1);
        Permission::create([
            'action'        => 'Eliminar libro contable',
            'name'          => 'contabilities.destroy',
            'description'   => 'Podría eliminar cualquier usuario del sistema',      
        ])->syncRoles($role1);

    }
}
