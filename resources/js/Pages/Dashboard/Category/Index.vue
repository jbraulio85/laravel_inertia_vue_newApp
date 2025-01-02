<script>
import { Link } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import Pagination from "@/Shared/Pagination.vue";

export default {
    components: {
        AppLayout,
        Link,
        Pagination,
    },
    props: {
        categories: Object,
    },
};
</script>

<template>
    <app-layout>
        <div class="container">
            <Link
                class="link-button-default mt-2 mb-2"
                :href="route('category.create')"
                >Create category</Link
            >
            <div class="card">
                <div class="card-body">
                    <table class="w-full border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-3">Id</th>
                                <th class="p-3">Title</th>
                                <th class="p-3">Slug</th>
                                <th class="p-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="c in categories.data" :key="c.id">
                                <td class="p-2">{{ c.id }}</td>
                                <td class="p-2">{{ c.title }}</td>
                                <td class="p-2">{{ c.slug }}</td>
                                <td class="p-2">
                                    <Link
                                        class="text-sm text-purple-400 hover:text-purple-700"
                                        :href="route('category.edit', c)"
                                        >Edit</Link
                                    >
                                    <Link
                                        method="delete"
                                        as="button"
                                        class="text-sm text-red-400 hover:text-red-700 ml-3"
                                        :href="route('category.destroy', c)"
                                    >
                                        Delete
                                    </Link>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-4 text-center">
                        <pagination :links="categories.links" />
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>
