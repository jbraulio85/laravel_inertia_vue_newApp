<template>
    <template v-for="(l, index) in links" :key="index">
        <component
            v-html="l.label"
            class="px-3 py-2 mr-3 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50"
            :is="!l.active ? 'Link' : 'span'"
            :href="l.url == null ? '#' : l.url"
            :class="l.active ? 'cursor-pointer text-gray-500' : ''"
        />
    </template>
</template>

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
    props: {
        links: {
            type: Array,
            required: true,
        },
    },
};
</script>
