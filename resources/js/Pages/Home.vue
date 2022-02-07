<template>

    <Nav />

    <div class="relative bg-gray-50 pt-16 pb-20 px-4 sm:px-6 lg:pt-24 lg:pb-28 lg:px-8">
        <div class="absolute inset-0">
            <div class="bg-white h-1/3 sm:h-2/3" />
        </div>
        <div class="relative max-w-7xl mx-auto">
            <div class="text-center">
                <h2 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-4xl">
                    From the blog
                </h2>
                <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-500 sm:mt-4">
                    Read what's currently trending.
                </p>
            </div>

            <div class="mt-12 max-w-lg mx-auto grid gap-5 lg:grid-cols-3 lg:max-w-none">
                <div v-for="post in posts" :key="post.title" class="flex flex-col rounded-lg shadow-lg overflow-hidden">
                    <div class="flex-shrink-0">
                        <img class="h-48 w-full object-cover" :src="post.imageUrl" alt="" />
                    </div>
                    <div class="flex-1 bg-white p-6 flex flex-col justify-between">
                        <div class="flex-1">
                            <p class="text-sm font-medium text-indigo-600">
                                <a :href="post.category.href" class="hover:underline">
                                    {{ post.category.name }}
                                </a>
                            </p>
                            <a :href="post.href" class="block mt-2">
                                <p class="text-xl font-semibold text-gray-900">
                                    {{ post.title }}
                                </p>
                                <p class="mt-3 text-base text-gray-500">
                                    {{ post.description }}
                                </p>
                            </a>
                        </div>
                        <div class="mt-6 flex items-center">
                            <div class="flex-shrink-0">
                                <!--                                <a :href="post.author.href">-->
                                <span class="sr-only">{{ post.author.name }}</span>
                                <img class="h-10 w-10 rounded-full" :src="post.author.imageUrl" alt="" />
                                <!--                                </a>-->
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">
                                    <!--                                    <a :href="post.author.href" class="hover:underline">-->
                                    {{ post.author.name }}
                                    <!--                                    </a>-->
                                </p>
                                <div class="flex space-x-1 text-sm text-gray-500">
                                    <time :datetime="post.datetime">
                                        {{ post.date }}
                                    </time>
                                    <span aria-hidden="true">
                    &middot;
                  </span>
                                    <span> {{ post.readingTime }} read </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Nav from '../Shared/Nav';
import { Link } from '@inertiajs/inertia-vue3';

export default {
    components: {Nav, Link},
    props: { posts: Array },
}
</script>
