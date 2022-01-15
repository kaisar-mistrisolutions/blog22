<template>
	<svelte:head>
		<title>Edit Blog Category - NameSpace IT</title>
		<meta head-key="description" name="description" content="This is a page specific description" />
	</svelte:head>
	<app-layout>
		<div>
			<!-- Breadcrumb Start -->
			<div class="pl-8 pb-4">
				<nav class="flex" aria-label="Breadcrumb">
					<ol role="list" class="bg-white rounded-md shadow px-6 flex space-x-4">
						<li class="flex">
							<div class="flex items-center">
								<a href="#" class="text-gray-400 hover:text-gray-500">
									<HomeIcon class="flex-shrink-0 h-5 w-5" aria-hidden="true" />
									<span class="sr-only">Home</span>
								</a>
							</div>
						</li>
						<li v-for="page in pages" :key="page.name" class="flex">
							<div class="flex items-center">
								<svg class="flex-shrink-0 w-6 h-full text-gray-200" viewBox="0 0 24 44" preserveAspectRatio="none" fill="currentColor" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
									<path d="M.293 0l22 22-22 22h1.414l22-22-22-22H.293z" />
								</svg>
								<a :href="page.href" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" :aria-current="page.current ? 'page' : undefined">{{ page.name }}</a>
							</div>
						</li>
					</ol>
				</nav>
			</div>
			<!-- Breadcrumb End -->
			<div class="md:grid md:grid-cols-3 md:gap-6 pr-20 pl-10 pb-20 pt-10">
				<div class="md:col-span-1">
					<div class="px-4 sm:px-0">
						<h3 class="text-lg font-medium leading-6 text-gray-900">Create a New Blog Category</h3>
						<p class="mt-1 text-sm text-gray-600">Fill the form to create a new blog category.</p>
					</div>
				</div>
				<div class="mt-5 md:mt-0 md:col-span-2">
					<form @submit.prevent="submit">
						<div class="shadow sm:rounded-md sm:overflow-hidden">
							<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
								<div class="col-span-3 sm:col-span-2">
									<label for="name" class="block text-sm font-medium text-gray-700">Name </label>
									<div class="mt-1 flex rounded-md shadow-sm">
										<input type="text" name="name" id="name" v-model="form.name" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="category name" />
									</div>
									<span v-if="form.errors.name" class="flex items-center justify-center p-2 text-center text-red-700">{{ form.errors.name }}</span>
								</div>
							</div>

							<div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
								<button class="bg-indigo-500 px-4 py-2 text-white font-bold rounded hover:bg-green-500 transition" type="submit">Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</app-layout>
</template>

<script>
import Input from "../../../Jetstream/Input.vue"
import AppLayout from "../../../Layouts/Backend/AppLayout.vue"
import {ExclamationCircleIcon} from "@heroicons/vue/solid"
import {useForm} from "@inertiajs/inertia-vue3"
import {HomeIcon} from "@heroicons/vue/solid"
import {ref} from "vue"

const pages = [{name: "All Categories", href: "/app/categories", current: true}]

export default {
	components: {
		AppLayout,
		Input,
		ExclamationCircleIcon,
		HomeIcon,
	},
	props: {
		category: Object,
	},
	setup(props) {
		const image = ref(null)

		const form = useForm({
			_method: "PUT",
			name: props.category.name,
		})
		function submit() {
			form.post(`/app/categories/${props.category.id}`)
		}
		return {
			form,
			submit,
			pages,
		}
	},
}
</script>
