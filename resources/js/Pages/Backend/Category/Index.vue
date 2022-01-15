<template>
	<svelte:head>
		<title>Blog Category - NameSpace IT</title>
		<meta head-key="description" name="description" content="This is a page specific description" />
	</svelte:head>
	<app-layout>
		<section class="px-0 py-10 bg-gray-100">
			<div class="max-w-5xl mx-auto">
				<div class="mb-6 flex justify-between items-center">
					<div class="flex w-full bg-white shadow rounded max-w-md"></div>

					<Link :href="route('app.categories.create')" class="bg-indigo-500 px-4 py-2 text-white font-bold rounded hover:bg-green-500 transition">
						<span>Create Blog</span>
					</Link>
				</div>

				<!-- Information table -->
				<div class="flex flex-col">
					<div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
						<div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
							<div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
								<table class="min-w-full divide-y divide-gray-200">
									<thead class="bg-white">
										<tr class="text-left font-bold">
											<th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">S/N</th>
											<th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">NAME</th>
											<th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">SLUG</th>
											<th scope="col" class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ACTION</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(category, index) in categories" class="hover:bg-gray-100 focus-within:bg-gray-100" :key="index" :class="index % 2 === 0 ? 'bg-white' : 'bg-gray-50'">
											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ index + 1 }}</td>

											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
												{{ category.name }}
											</td>

											<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
												{{ category.slug }}
											</td>

											<td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
												<div class="flex justify-start items-center space-x-2">
													<Link :href="route('app.categories.edit', category.id)" type="button">
														<PencilAltIcon class="h-6 text-green-500" />
													</Link>
													<button type="button" @click="openModel(category.id)">
														<TrashIcon class="h-6 text-red-500" />
													</button>
												</div>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

				<TransitionRoot as="template" :show="open">
					<Dialog as="div" static class="fixed z-10 inset-0 overflow-y-auto" @close="open = false" :open="open">
						<div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
							<TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in duration-200" leave-from="opacity-100" leave-to="opacity-0">
								<DialogOverlay class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" />
							</TransitionChild>
							<span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
							<TransitionChild as="template" enter="ease-out duration-300" enter-from="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" enter-to="opacity-100 translate-y-0 sm:scale-100" leave="ease-in duration-200" leave-from="opacity-100 translate-y-0 sm:scale-100" leave-to="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
								<div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
									<div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
										<div class="sm:flex sm:items-start">
											<div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
												<ExclamationIcon class="h-6 w-6 text-red-600" aria-hidden="true" />
											</div>
											<div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
												<DialogTitle as="h3" class="text-lg leading-6 font-medium text-gray-900">Remove Blog Category?</DialogTitle>
												<div class="mt-2">
													<p class="text-sm text-gray-500">Are you sure you want to remove the blog category? All of your data will be permanently removed. This action cannot be undone.</p>
												</div>
											</div>
										</div>
									</div>
									<div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
										<button type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm" @click="deleteCategory()">Delete</button>
										<button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" @click="open = false" ref="cancelButtonRef">Cancel</button>
									</div>
								</div>
							</TransitionChild>
						</div>
					</Dialog>
				</TransitionRoot>
				<!--     model end     -->
			</div>
		</section>
	</app-layout>
</template>

<script>
import AppLayout from "../../../Layouts/Backend/AppLayout.vue"
import {Inertia} from "@inertiajs/inertia"
import {ref, onMounted, onBeforeMount} from "vue"
import {HomeIcon} from "@heroicons/vue/solid"
import {Link} from "@inertiajs/inertia-vue3"
import {Dialog, DialogOverlay, DialogTitle, TransitionChild, TransitionRoot, Switch} from "@headlessui/vue"

import {MenuIcon, BadgeCheckIcon, EyeIcon, QuestionMarkCircleIcon, CollectionIcon, TrashIcon, ExclamationIcon, PencilAltIcon, SearchIcon} from "@heroicons/vue/outline"

export default {
	components: {
		AppLayout,
		MenuIcon,
		BadgeCheckIcon,
		EyeIcon,
		QuestionMarkCircleIcon,
		CollectionIcon,
		TrashIcon,
		Dialog,
		DialogOverlay,
		DialogTitle,
		TransitionChild,
		TransitionRoot,
		ExclamationIcon,
		PencilAltIcon,
		SearchIcon,
		HomeIcon,
		Link,
		Switch,
	},

	props: {
		categories: Array,
	},
	setup() {
		const open = ref(false)
		const category_id = ref(null)
		function openModel(id) {
			category_id.value = id
			open.value = true
		}

		function deleteCategory() {
			Inertia.delete(`/app/categories/${category_id.value}`, {
				preserveState: true,
				preserveScroll: true,
				onSuccess: (page) => {
					open.value = false
				},
			})
		}

		return {
			open,
			openModel,
			deleteCategory,
		}
	},
}
</script>
