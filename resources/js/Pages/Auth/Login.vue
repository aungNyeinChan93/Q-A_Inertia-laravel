<template>

    <div>

        <Head title="Login" />

        <!-- form -->
        <div class="mx-auto max-w-screen-xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-lg">
                <h1 class="text-center text-2xl font-bold text-indigo-600 sm:text-3xl">Get started today</h1>

                <p class="mx-auto mt-4 max-w-md text-center text-gray-500">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati sunt dolores deleniti
                    inventore quaerat mollitia?
                </p>

                <form @submit.prevent="formSubmit" class="mb-0 mt-6 space-y-4 rounded-lg p-4 shadow-lg sm:p-6 lg:p-8">
                    <p class="text-center text-lg font-medium">Sign in to your account</p>

                    <div>
                        <label for="email" class="sr-only">Email</label>

                        <div class="relative">
                            <input type="email" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                                :class="{ 'border border-red-600': $page.props.errors.email }" v-model="form.email"
                                placeholder="Enter email" />

                            <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </span>
                        </div>
                        <div class="text-sm text-red-600 p-1">{{ $page.props.errors.email }}</div>
                    </div>

                    <div>
                        <label for="password" class="sr-only">Password</label>

                        <div class="relative">
                            <input type="password" class="w-full rounded-lg border-gray-200 p-4 pe-12 text-sm shadow-sm"
                                :class="{ 'border border-red-600': $page.props.errors.password }" v-model="form.password"
                                placeholder="Enter password" />

                            <span class="absolute inset-y-0 end-0 grid place-content-center px-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="size-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </span>
                        </div>
                        <div class="text-sm text-red-600 p-1">{{ $page.props.errors.password }}</div>

                    </div>

                    <button type="submit"
                    :disabled="form.processing"
                    :class="{'bg-blue-400/50':form.processing}"
                        class="block relative w-full rounded-lg bg-indigo-600 px-5 py-3 text-sm font-medium text-white">
                        <span>Sign in</span>
                        <div role="status" v-if="form.processing" class=" absolute top-3 right-4">
                            <svg aria-hidden="true"
                                class="w-5 h-5 text-gray-200 animate-spin dark:text-green-600 fill-red-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>

                    <p class="text-center text-sm text-gray-500">
                        No account?
                        <Link class="underline" :href="route('register')">Sign up</Link>
                    </p>
                </form>
            </div>
        </div>
    </div>

</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import Second from '../Layout/Second.vue';
defineOptions({
    layout: Second,
})

const form = useForm({
    email: null,
    password: null
});

const formSubmit = () => {
    form.post('/login', {
        onError: () => form.reset('password')
    }, { preserveState: true })
}


</script>

<style lang="scss" scoped></style>
