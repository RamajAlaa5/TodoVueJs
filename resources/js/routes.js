import AllTodo from './components/List.vue';
 import CreateTodo from './components/Create.vue';
 import EditTodo from './components/Edit.vue';

 export const routes = [
     {
         name: 'home',
         path: '/',
         component: AllTodo
     },
     {
         name: 'create',
         path: '/create',
         component: CreateTodo
     },
     {
         name: 'edit',
         path: '/edit/:id',
         component: EditTodo
     }
 ];
