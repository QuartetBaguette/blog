<template>
    <Nav />
    <div class="relative pt-4 pb-16 overflow-hidden">
        <div class="flex justify-center space-y-6 container mx-auto py-4">
            <div class="bg-white px-4 py-5 sm:rounded-lg sm:p-6 max-w-3xl">
                <div class="md:grid md:grid-cols-1 md:gap-6">
                    <div class="text-lg">
                        <Link :href="route('blogs.index')">
                            <div class="flex">
                                <ArrowLeftIcon class="h-6 w-6 text-gray-400" />
                                <p class="text-gray-400 hover:underline items-center">Go back</p>
                            </div>
                        </Link>
                        <div class="flex-shrink-0">
                            <img class="h-56 w-full object-cover rounded-lg" :src="blog.cover_url" alt="" />
                        </div>
                        <h1 class="mt-6">
                            <span class="mt-3 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-5xl">{{ blog.title }}</span>
                        </h1>
                        <p class="mt-8 text-xl text-gray-500 leading-8">{{ blog.summary }}</p>
                    </div>
                    <div class="mt-6 text-xl text-gray-500">
                        <p>{{ blog.content }}</p>
                    </div>

                    <h1 class="mt-6">
                        <span class="mt-20 block text-2xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-3xl">Comment section</span>
                    </h1>
                        <ul role="list" class="divide-y divide-gray-200">
                            <li v-for="comment in blog.comments" :key="comment.id" class="relative bg-white py-5 px-4 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
                                <div class="flex justify-between space-x-3">
                                    <div class="min-w-0 flex-1">
                                        <span class="absolute inset-0" aria-hidden="true" />
                                        <p class="text-sm font-medium text-gray-900">{{ comment.user.name }}</p>
                                    </div>
                                    <time :datetime="comment.created_at" class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{ comment.created_at }}</time>
                                </div>
                                <div class="mt-1">
                                    <p class="line-clamp-2 text-sm text-gray-600">
                                        {{ comment.comment }}
                                    </p>
                                </div>
                            </li>
                        </ul>

                    <div class="container mx-auto flex justify-center" v-if="errors.comment">
                        <div class="flex rounded-md border border-yellow-500 bg-yellow-50 p-4">
                            <div class="flex-shrink-0">
                                <ExclamationIcon class="h-5 w-5 text-yellow-400" aria-hidden="true" />
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-yellow-800">Attention needed</h3>
                                <div class="text-sm text-yellow-700" v-for="error in errors">
                                    <p>&middot; {{error}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6">
                        <div class="flex justify-center" v-if="blog.can_comment == true">
                            <h3 class="text-gray-400">The author has disabled commenting on this post.</h3>
                        </div>
                        <form @submit.prevent="submit" v-else>
                            <label for="comment" class="block text-sm font-medium text-gray-700"> Comment: </label>
                            <div class="mt-1">
                                <textarea id="comment" v-model="form.comment" required="" name="summary" rows="3" class="py-3 px-4 block w-full shadow-sm text-black focus:ring-black focus:boring-black border border-gray-500 rounded-md" placeholder="Comment" />
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Leave feedback for the author.</p>
                            <button type="submit" class="mt-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <Footer />
</template>


<script>
import Nav from "../../Shared/Layout/Nav";
import Footer from "../../Shared/Layout/Footer";
import { Link } from '@inertiajs/inertia-vue3'
import { ArrowLeftIcon } from '@heroicons/vue/outline'
import { ExclamationIcon } from '@heroicons/vue/solid'

export default {
    components: {Footer, Nav, ArrowLeftIcon, Link, ExclamationIcon},

    props: {
        blog: Object,
        errors: Object,
    },

    data() {
        return {
            form: this.$inertia.form({
                comment: null,
                blog_id: this.blog.id,
            })
        }
    },
    methods: {
        submit() {
            this.form.post(route('comments.store'))
        }
    }
}
</script>
