<script>
import { router, useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";

export default {
    props: {
        errors: {
            type: Object,
            default: () => ({}),
        },
    },
    components: {
        AppLayout,
    },
    setup() {
        const form = useForm({
            title: "",
            slug: "",
        });

        function submit() {
            router.post(route("category.store"), form);
        }
        return { form, submit };
    },
};
</script>

<template>
    <AppLayout title="Create Category">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create Category
            </h2>
        </template>
        <form @submit.prevent="submit">
            <label for="title">Title</label>
            <input id="title" type="text" v-model="form.title">
            <div v-if="errors.title" class="text-red-600">{{ errors.title }}</div>

            <label for="slug">Slug</label>
            <input id="slug" type="text" v-model="form.slug">
            <div v-if="errors.slug" class="text-red-600">{{ errors.slug }}</div>

            <input type="submit" value="Send">
        </form>
    </AppLayout>
</template>
