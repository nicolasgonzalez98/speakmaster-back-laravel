<script>
export default {
    name : 'CategoriesIndex'
};
</script>

<script setup>
    import AppLayout from '@/Layouts/AppLayout.vue';
    import { Link } from '@inertiajs/vue3';
    import { Inertia } from '@inertiajs/inertia'

    defineProps({
        categories: {
            type: Object,
            required: true
        },

    })

    const deleteCategory = (id) => {
        if(confirm("¿Estas seguro?")){
            Inertia.delete(route('categories.destroy', id));
        }
    }

    
</script>

<template>
    <AppLayout> 
        <template #header>
            <h1 class="font-semibold text-xl text-gray-800 leading-tight">Categories</h1>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between">
                        <Link :href="route('categories.create')" class="bg-indigo-500 hover:bg-indigo-700 rounded py-2 px-4 text-white" v-if="$page.props.user.permissions.includes('create categories')">
                            Create category
                        </Link>
                        
                    </div>
                

                <div class="mt-4">
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex justify-between gap-x-6 py-5" v-for="(category, i) in categories.data" :key="i">
                          <div class="flex min-w-0 gap-x-4">
                            
                            <div class="min-w-0 flex-auto">
                              <p class="text-md font-semibold leading-6 text-gray-900">{{ category.name }}</p>
                            </div>
                          </div>
                          <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                            <p class="text-md leading-6 text-gray-900">
                                <Link class="py-2 px-4 hover:text-green-600" v-if="$page.props.user.permissions.includes('update categories')" :href="route('categories.edit', category.id)">Edit</Link>
                                <Link class="py-2 px-4 text-red-600 hover:text-red-950" v-if="$page.props.user.permissions.includes('delete categories')" @click="deleteCategory(category.id)">Delete </Link></p>
                            
                          </div>
                        </li>
                    </ul>
                </div>
                <div class="flex justify-between mt-2">
                    <Link :href="categories.prev_page_url" class="rounded py-2 px-4" v-if="categories.prev_page_url">
                        Prev
                    </Link>
                    <div v-else></div>
                    <Link :href="categories.next_page_url" v-if="categories.next_page_url" class="rounded py-2 px-4">
                        Next
                    </Link>
                    <div v-else></div>
                </div>
            </div>
            </div>
        </div>
    </AppLayout>
</template>