<template>
    <footer class="bg-white">
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
                <div v-for="item in navigation.main" :key="item.name" class="px-5 py-2">
                    <Link :href="item.href" class="text-base text-gray-500 hover:text-gray-900">
                        {{ item.name }}
                    </Link>
                </div>
            </nav>
            <p class="mt-8 text-center text-base text-gray-400">&copy; 2022 Giesen Coffee Roasters</p>
        </div>
    </footer>
</template>

<script>
import { defineComponent, h } from 'vue'
import { Link } from '@inertiajs/inertia-vue3'

const navigation = {
    main: [
        { name: 'Home', href: route('home') },
        { name: 'Blogs', href: route('blogs.index') },
        { name: 'Write blog', href: route('blogs.create')}
    ],
}

export default {
    components: {
        Link,
    },
    setup() {
        return {
            navigation,
        }
    },
}
</script>
