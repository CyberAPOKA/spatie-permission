<script setup>
import { computed, ref } from 'vue';
import { Head, Link } from '@inertiajs/vue3';

const props = defineProps({
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
    name: String,
    permissions: Array
});

const routePermissions = {
    'dashboard2': 'view dashboard',
    'orders': 'view orders',
    'customers': 'view customers',
    'marketing-schedule': 'view marketing schedule',
    'finances': 'view finances',
    'users': 'view users',
    'events': 'view events',
    'coupons': 'view coupons',
    'courtesy': 'view courtesy',
    'marketing': 'view marketing',
    'partnerships': 'view partnerships',
    'graphic-materials': 'view graphic materials',
    'drafts': 'view drafts',
    'my-orders': 'view my orders',
    'my-account': 'view my account',
};

const routes = ref([
    { name: 'dashboard2', label: 'Dashboard', url: '/dashboard' },
    { name: 'orders', label: 'Orders', url: '/orders' },
    { name: 'customers', label: 'Customers', url: '/customers' },
    { name: 'marketing-schedule', label: 'Marketing Schedule', url: '/marketing-schedule' },
    { name: 'finances', label: 'Finances', url: '/finances' },
    { name: 'users', label: 'Users', url: '/users' },
    { name: 'events', label: 'Events', url: '/events' },
    { name: 'coupons', label: 'Coupons', url: '/coupons' },
    { name: 'courtesy', label: 'Courtesy', url: '/courtesy' },
    { name: 'marketing', label: 'Marketing', url: '/marketing' },
    { name: 'partnerships', label: 'Partner ships', url: '/partnerships' },
    { name: 'graphic-materials', label: 'Graphic Materials', url: '/graphic-materials' },
    { name: 'drafts', label: 'Drafts', url: '/drafts' },
    { name: 'my-orders', label: 'My Orders', url: '/my-orders' },
    { name: 'my-account', label: 'My Account', url: '/my-account' },
]);

const hasPermission = (route) => {
    const permission = routePermissions[route];
    return props.permissions.includes(permission);
};

const linkClass = (route) => {
    if (!hasPermission(route)) {
        return 'w-80 h-40 flex justify-center items-center p-6 border-2 border-dashed border-violet-400 text-4xl font-black bg-red-600 text-white text-center relative';
    }
    return 'w-80 h-40 flex justify-center items-center p-6 border-2 border-dashed border-violet-400 text-4xl font-black text-violet-800 hover:bg-indigo-300 text-center';
};

</script>


<template>
    <Head title="Welcome" />
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
            <Link v-if="$page.props.auth.user" :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">
            Dashboard</Link>

            <template v-else>
                <div class="mt-8">
                    <Link :href="route('login')"
                        class="text-4xl font-bold text-yellow-400 bg-black border-4 border-dashed border-yellow-400 px-8 py-2">
                    Log in</Link>

                    <Link v-if="canRegister" :href="route('register')"
                        class="text-4xl font-bold text-yellow-400 bg-violet-950 border-4 border-dotted border-y-pink-500 border-x-emerald-500 px-8 py-2 ml-4 ">
                    Register</Link>
                </div>
            </template>
        </div>

        <div class="mx-auto p-6 lg:p-8">
            <div v-if="name" class="pb-12 text-center">
                <h1 class="text-5xl font-bold text-violet-700">{{ name }}</h1>
                <p class="mt-2 text-2xl text-teal-700">{{ permissions }}</p>
            </div>
            
            <p v-else class="text-5xl font-bold text-pink-500 text-center pb-12">Você não está logado.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 justify-items-center">
                <div v-for="route in routes" :key="route.name" class="w-80 h-40"
                    :class="{ 'no-permission-container': !hasPermission(route.name) }">
                    <svg v-if="!hasPermission(route.name)" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="no-permission-svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636" />
                    </svg>
                    <Link :href="route.url" :class="linkClass(route.name)">
                    <span class="a-text">{{ route.label }}</span>
                    <!-- {{ hasPermission(route.name) }} -->
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}

@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}

.no-permission-container {
    position: relative;
}

.no-permission-svg {
    position: absolute;
    height: 100%;
    width: 100%;
    opacity: 0;
    transition: opacity 0.3s;
    z-index: 99;
    fill: white;
    stroke: rgb(220 38 38 / var(--tw-bg-opacity));
    border: 2px dashed rgb(220 38 38 / var(--tw-bg-opacity));
    cursor: not-allowed;
}

.no-permission-container:hover .no-permission-svg {
    opacity: 1;
}

.no-permission-container:hover a {
    background-color: white;
}

.no-permission-container:hover .a-text {
    opacity: 0;
}
</style>
