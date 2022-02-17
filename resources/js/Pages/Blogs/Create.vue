<template>
    <Nav />
    <div class="flex justify-center py-6">
        <h2 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl">
            Write your own blog
        </h2>
    </div>

    <div class="container mx-auto flex justify-center" v-if="errors.content || errors.summary || errors.title">
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

    <div class="space-y-6 container mx-auto py-4">
        <div class="bg-white shadow px-4 py-5 sm:rounded-lg sm:p-6">
            <div class="md:grid md:grid-cols-3 md:gap-6">
                <div class="md:col-span-1">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">General blog information</h3>
                    <p class="mt-1 text-sm text-gray-500">General information about your blog, title, summary and cover picture.</p>
                </div>
                <div class="mt-5 md:mt-0 md:col-span-2">
                    <form class="space-y-6" @submit.prevent="submit">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label for="title" class="block text-sm font-medium text-gray-700"> Title </label>
                                <div class="mt-1 flex rounded-md shadow-sm">
                                    <input type="text" v-model="form.title" required="" name="title" id="title" class="py-3 px-4 block w-full shadow-sm text-black focus:ring-black focus:boring-black border border-gray-500 rounded-md" placeholder="Title" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="summary" class="block text-sm font-medium text-gray-700"> Summary </label>
                            <div class="mt-1">
                                <textarea id="summary" v-model="form.summary" required="" name="summary" rows="3" class="py-3 px-4 block w-full shadow-sm text-black focus:ring-black focus:boring-black border border-gray-500 rounded-md" placeholder="Summary" />
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Brief description of your article. (This text is show on the <Link href="/blogs" class="font-medium text-indigo-600 hover:text-indigo-500 hover:underline">blogs page.</Link>)</p>
                        </div>

                        <div>
                            <label for="content" class="block text-sm font-medium text-gray-700"> Content </label>
                            <div class="mt-1">
                                <textarea id="content" v-model="form.content" required="" name="content" rows="15" class="py-3 px-4 block w-full shadow-sm text-black focus:ring-black focus:boring-black border border-gray-500 rounded-md" placeholder="Content" />
                            </div>
                            <p class="mt-2 text-sm text-gray-500">Main content of you blog article.</p>
                        </div>

                        <div class="md:col-span-1">
                            <h3 class="text-lg font-medium leading-6 text-gray-900">Accessibility</h3>
                            <p class="mt-1 text-sm text-gray-500">Decide your desired accessibility settings for the blog.</p>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <fieldset>
                                <legend class="text-base font-medium text-gray-900">Accessibility settings:</legend>
                                <div class="mt-4 space-y-4">
                                    <div class="flex items-start">
                                        <div class="h-5 flex items-center">
                                            <input id="comments" v-model="form.comments" name="comments" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="comments" class="font-medium text-gray-700">Disable comments</label>
                                            <p class="text-gray-500">Disable comments on your blog post.</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start">
                                        <div class="flex items-center h-5">
                                            <input id="anonymous" v-model="form.anonymous" name="anonymous" type="checkbox" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                        </div>
                                        <div class="ml-3 text-sm">
                                            <label for="anonymous" class="font-medium text-gray-700">Anonymous post</label>
                                            <p class="text-gray-500">Hides your username and user profile picture.</p>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                        <div class="flex justify-end">
                            <button type="button" class="bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
                            <button type="submit" class="ml-3 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <Footer />
</template>

<script>
import Nav from '../../Shared/Layout/Nav';
import Footer from "../../Shared/Layout/Footer";
import { Link } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { ExclamationIcon } from '@heroicons/vue/solid'

export default {
    components: {
        Footer,
        Nav,
        Link,
        ExclamationIcon,
    },

    props: {
        errors: Object,
    },

    setup () {
        const form = reactive({
            title: null,
            summary: null,
            content: null,
            cover: 'https://images.unsplash.com/photo-1547586696-ea22b4d4235d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1679&q=80',
            readingTime: null,
            comments: false,
            anonymous: false,
        })

        function submit() {
            // this.form.post(route('blog.create'))
            Inertia.post(route('blogs.store'), form)
        }

        return {form, submit}
    }
}
</script>
