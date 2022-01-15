<template>
	<svelte:head>
		<title>Edit Blog - NameSpace IT</title>
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
				<div class="mt-5 ml-36 md:mt-0 md:col-span-2">
					<form @submit.prevent="submit">
						<div class="shadow sm:rounded-md sm:overflow-hidden">
							<div class="px-4 py-5 bg-white space-y-6 sm:p-6">
								<div class="col-span-3 sm:col-span-2">
									<label for="title" class="block text-sm font-medium text-gray-700">Title </label>
									<div class="mt-1 flex rounded-md shadow-sm">
										<input type="text" name="title" id="title" v-model="form.title" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="Title" />
									</div>
									<span v-if="form.errors.title" class="flex items-center justify-center p-2 text-center text-red-700">{{ form.errors.title }}</span>
								</div>

								<!-- Cate Name -->
								<label for="category" class="block text-sm font-medium text-gray-700">CATEGORY</label>
								<select id="category_id" name="category_id" v-model="form.category_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
									<option hidden>Select Category</option>
									<option v-for="(category, index) in categories" :key="index" :value="category.id">
										{{ category.name }}
									</option>
								</select>

								<div>
									<label for="description" class="block text-sm font-medium text-gray-700"> DESCRIPTION </label>
									<div class="mt-1 flex rounded-md shadow-sm">
										<textarea type="text" rows="4" name="description" id="description" v-model="form.description" class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-md sm:text-sm border-gray-300" placeholder="" />
									</div>
									<span v-if="form.errors.description" class="flex items-center justify-center p-2 text-center text-red-700">{{ form.errors.description }}</span>
								</div>

								<div class="mt-8 relative flex items-center border border-gray-200 rounded-sm">
									<label class="absolute -top-4 z-10 font-semibold text-gray-500 ml-4 bg-gray-50 p-1">THUMBNAIL IMAGE</label>
									<input @input="form.image = $event.target.files[0]" @change="upload_image" id="file-upload" name="file-upload" type="file" class="pt-6 relative max-w-lg block w-full h-20 font-semibold px-4 sm:max-w-full sm:text-base required text-gray-500 focus:outline-none" />
									<img v-if="get_image()" class="h-32 w-40 m-3 p-3" :src="get_image()" alt="Thumbnail" />
									<img v-else class="h-32 w-40 m-3 p-3" :src="blog.thumbnail" alt="Thumbnail" />
								</div>
								<span v-if="form.errors.image" class="flex items-center justify-center p-2 text-center text-red-700">{{ form.errors.image }}</span>
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

const pages = [{name: "All Blogs", href: "/app/blogs", current: true}]

export default {
	components: {
		AppLayout,
		Input,
		ExclamationCircleIcon,
		HomeIcon,
	},
	props: {
		blog: Object,
		categories: Array,
	},
	setup(props) {
		const image = ref(null)

		const form = useForm({
			_method: "PUT",
			title: props.blog.title,
			category_id: props.blog.category_id,
			description: props.blog.body,
			image: null,
		})
		function submit() {
			form.post(`/app/blogs/${props.blog.id}`)
		}

		function upload_image(e) {
			let file = e.target.files[0]
			let reader = new FileReader()
			if (file["size"] < 2111775) {
				reader.onloadend = (file) => {
					image.value = reader.result
				}
				reader.readAsDataURL(file)
			} else {
				alert("File size can not be bigger than 2 MB")
			}
		}
		function get_image() {
			let photo = image.value
			return photo
		}
		return {
			form,
			submit,
			pages,
			get_image,
			upload_image,
		}
	},
}
</script>
