<script setup>
import { ref } from 'vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import AuthenticationCardLogo from '@/Components/AuthenticationCardLogo.vue';
import Checkbox from '@/Components/Checkbox.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

defineProps({
    canResetPassword: Boolean,
    status: String,
});

const form = useForm({
    email: '',
    password: '',
    remember: false,
});

const submit = () => {
    form.transform(data => ({
        ...data,
        remember: form.remember ? 'on' : '',
    })).post(route('login'), {
        onFinish: () => form.reset('password'),
    });
};
const copyMessage = ref('');
const copyEmail = (email) => {
    navigator.clipboard.writeText(email);
    copyMessage.value = 'Copiado ♥' ;
    setTimeout(() => copyMessage.value = '', 3000);
};
</script>

<template>
    <Head title="Log in" />

    <AuthenticationCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>

        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
            {{ status }}
        </div>
        <div class="py-4">
            <ul class="grid grid-cols-2 gap-y-4">
                <li @click="copyEmail('master@hotmail.com')" class="hover:cursor-copy">master@hotmail.com</li>
                <li @click="copyEmail('service@hotmail.com')" class="hover:cursor-copy">service@hotmail.com</li>
                <li @click="copyEmail('financial@hotmail.com')" class="hover:cursor-copy">financial@hotmail.com</li>
                <li @click="copyEmail('marketing@hotmail.com')" class="hover:cursor-copy">marketing@hotmail.com</li>
                <li @click="copyEmail('organizer@hotmail.com')" class="hover:cursor-copy">organizer@hotmail.com</li>
                <li @click="copyEmail('influencer@hotmail.com')" class="hover:cursor-copy">influencer@hotmail.com</li>
                <li @click="copyEmail('athlete@hotmail.com')" class="hover:cursor-copy">athlete@hotmail.com</li>
                <li v-if="copyMessage" class="text-green-500">{{ copyMessage }}</li>
            </ul>

        </div>
        <form @submit.prevent="submit">
            <div>
                <InputLabel for="email" value="Email" />
                <TextInput id="email" v-model="form.email" type="email" class="mt-1 block w-full" required autofocus
                    autocomplete="username" />
                <InputError class="mt-2" :message="form.errors.email" />
            </div>

            <div class="mt-4">
                <InputLabel for="password" value="Password" />
                <TextInput id="password" v-model="form.password" type="password" class="mt-1 block w-full" required
                    autocomplete="current-password" />
                <InputError class="mt-2" :message="form.errors.password" />
            </div>

            <div class="block mt-4">
                <label class="flex items-center">
                    <Checkbox v-model:checked="form.remember" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                <Link v-if="canResetPassword" :href="route('password.request')"
                    class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Forgot your password?
                </Link>

                <PrimaryButton class="ml-4" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                    Log in
                </PrimaryButton>
            </div>
        </form>
    </AuthenticationCard>
</template>
