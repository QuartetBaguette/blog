<template>

    <Nav />

    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3" />
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    Featured blog posts
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    A selection of the current featured blogs for you to read.
                </p>
            </div>

            <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                <div v-for="post in posts" :key="post.title" class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" :src="post.cover" alt="" />
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <Link href="/blogs" class="hover:underline">
                                    Article
                                </Link>
                            </p>
                            <Link href="/blogs" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    {{ post.title }}
                                </p>
                                <p class="mt-3 text-base text-gray-500 line-clamp-4">
                                    {{ post.summary }}
                                </p>
                            </Link>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <span class="sr-only">{{ post.author }}</span>
                                <img class="h-10 w-10 rounded-full" :src="" alt="" />
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    {{ post.author }}
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time :datetime="post.creationDate">
                                        {{ post.creationDate }}
                                    </time>
                                    <span aria-hidden="true">
                                        &middot;
                                    </span>
                                    <span> {{ post.readingTime }} min </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <Footer />
</template>

<script>
import Nav from '../Shared/Nav';
import { Link } from '@inertiajs/inertia-vue3';
import Footer from "../Shared/Footer";

export default {
    components: {
        Footer,
        Nav,
        Link,
    },
    props: { posts: Array },
}
</script>
