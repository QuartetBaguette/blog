<template>
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
                    <Link href="/blog" class="block mt-2">
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
                        <img class="h-10 w-10 rounded-full" alt="" />
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
                <div v-if="settings" class="pt-4">
                    <form @submit.prevent="submit">
                        <button type="submit" v-model="form.blogID" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                            <ExclamationIcon class="w-6 h-6 mr-1" />Delete post
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'
import { ExclamationIcon } from '@heroicons/vue/outline'
import {reactive} from "vue";
import {Inertia} from "@inertiajs/inertia";

export default {
    components: {
        Link,
        ExclamationIcon,
    },
    props: {
        posts: Array,
        settings: Boolean,
    },

    setup () {
        const form = reactive({
            blogID: null,
        })

        function submit() {
            Inertia.post('/blog/delete', form)
        }

        return { form, submit }
    },
}
</script>
