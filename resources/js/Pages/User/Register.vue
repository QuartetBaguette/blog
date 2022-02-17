<template>
    <Nav />

    <div class="min-h-full flex flex-col justify-center py-8 sm:px-6 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-md">
            <img class="mx-auto h-12 w-auto" src="https://nl-nl.giesen.com/wp-content/uploads/2021/09/Giesen-Coffee-Roasters-Black-PNG-01-768x304.png" alt="Workflow" />
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Create your account</h2>
            <p class="mt-2 text-center text-sm text-gray-600">
                Already registered?
                {{ ' ' }}
                <Link :href="route('login')" class="font-medium text-indigo-600 hover:text-indigo-500">Login here.</Link>
            </p>
        </div>

        <div class="container mx-auto flex justify-center mt-2" v-if="errors.email || errors.password">
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

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" @submit.prevent="submit">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700"> Username </label>
                        <div class="mt-1">
                            <input id="name" v-model="form.name" name="name" placeholder="Username" type="text" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700"> Email address </label>
                        <div class="mt-1">
                            <input id="email" v-model="form.email" name="email" placeholder="Email" type="email" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700"> Password </label>
                        <div class="mt-1">
                            <input id="password" v-model="form.password" name="password" placeholder="Password" type="password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>

                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 pt-2"> Confirm your password </label>
                        <div class="mt-1">
                            <input id="password_confirmation" v-model="form.password_confirmation" name="password" placeholder="Confirm password" type="password" required="" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <Footer />
</template>


<script>
import Nav from '../../Shared/Layout/Nav';
import { Link } from '@inertiajs/inertia-vue3';
import { reactive } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import Footer from "../../Shared/Layout/Footer";
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
            name: null,
            email: null,
            password: null,
            password_confirmation: null,
            imageURL: 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80',
        })

        function submit() {
            Inertia.post('/register', form)
        }

        return { form, submit }
    },
}
</script>
