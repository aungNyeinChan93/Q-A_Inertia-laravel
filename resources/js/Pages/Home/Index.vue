<template>

    <Head title="Home" />
    <section class="bg-gray-50">
        <div class="mx-auto max-w-screen-xl px-4 py-32 lg:flex lg:h-screen lg:items-center">
            <div class="mx-auto max-w-xl text-center">
                <h1 class="text-3xl font-extrabold sm:text-5xl">
                    Welcome !!
                    <strong class="font-extrabold text-red-700 sm:block">
                        {{ $page.props.auth.user ? $page.props.auth.user.name : null }}
                    </strong>
                </h1>

                <p class="mt-4 sm:text-xl/relaxed">
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt illo tenetur fuga ducimus
                    numquam ea!
                </p>

                <div v-if="!$page.props.auth.user" class="mt-8 flex flex-wrap justify-center gap-4">
                    <Link
                        class="block w-full rounded bg-red-600 px-12 py-3 text-sm font-medium text-white shadow hover:bg-red-700 focus:outline-none focus:ring active:bg-red-500 sm:w-auto"
                        :href="route('login')">
                    Login
                    </Link>

                    <Link
                        class="block w-full rounded px-12 py-3 text-sm font-medium text-red-600 shadow hover:text-red-700 focus:outline-none focus:ring active:text-red-500 sm:w-auto"
                        :href="route('register')">
                    Register
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { createToaster } from "@meforma/vue-toaster";
import { onMounted } from 'vue';

const props = defineProps({
    flash: {
        type: Object
    }
});

const page = usePage();
const toaster = createToaster({ position: "top-right" });
// toaster.show(`Welcome ${page.props.auth.user ? page.props.auth.user.name : ''}`, { type: 'success' });

onMounted(() => {
    if (props.flash.message) {
        toaster.show(`Welcome ${page.props.auth.user ? page.props.auth.user.name : ''} | ${props.flash.message}`, { type: 'success' });
    }
});

</script>

<style lang="scss" scoped></style>
