<template>
	<div class="h-screen flex overflow-hidden bg-gray-100">
		<TransitionRoot as="template" :show="sidebarOpen">
			<Dialog as="div" class="fixed inset-0 flex z-40 md:hidden" @close="sidebarOpen = false">
				<TransitionChild as="template" enter="transition-opacity ease-linear duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="transition-opacity ease-linear duration-300" leave-from="opacity-100" leave-to="opacity-0">
					<DialogOverlay class="fixed inset-0 bg-gray-600 bg-opacity-75" />
				</TransitionChild>
				<TransitionChild as="template" enter="transition ease-in-out duration-300 transform" enter-from="-translate-x-full" enter-to="translate-x-0" leave="transition ease-in-out duration-300 transform" leave-from="translate-x-0" leave-to="-translate-x-full">
					<div class="relative flex-1 flex flex-col max-w-xs w-full pt-5 pb-4 bg-gray-800">
						<TransitionChild as="template" enter="ease-in-out duration-300" enter-from="opacity-0" enter-to="opacity-100" leave="ease-in-out duration-300" leave-from="opacity-100" leave-to="opacity-0">
							<div class="absolute top-0 right-0 -mr-12 pt-2">
								<button type="button" class="ml-1 flex items-center justify-center h-10 w-10 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" @click="sidebarOpen = false">
									<span class="sr-only">Close sidebar</span>
									<XIcon class="h-6 w-6 text-white" aria-hidden="true" />
								</button>
							</div>
						</TransitionChild>
						<div class="flex-shrink-0 flex items-center px-4">
							<img class="h-8 w-auto" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow" />
						</div>
						<div class="mt-5 flex-1 h-0 overflow-y-auto">
							<nav class="px-2 space-y-1">
								<a v-for="item in navigation" :key="item.name" :href="item.href" :class="[item.current ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-gray-700', 'group flex items-center px-2 py-2 text-base font-medium rounded-md']">
									<component :is="item.icon" :class="[item.current ? 'text-gray-300' : 'text-gray-400 group-hover:text-gray-300', 'mr-4 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
									{{ item.name }}
								</a>
							</nav>
						</div>
					</div>
				</TransitionChild>
				<div class="flex-shrink-0 w-14" aria-hidden="true">
					<!-- Dummy element to force sidebar to shrink to fit close icon -->
				</div>
			</Dialog>
		</TransitionRoot>

		<!-- Static sidebar for desktop -->
		<div class="hidden md:flex md:flex-shrink-0">
			<div class="flex flex-col w-64">
				<!-- Sidebar component, swap this element with another sidebar if you like -->
				<div class="flex-1 flex flex-col min-h-0">
					<Link href="/" class="flex items-center h-16 flex-shrink-0 px-4 bg-gray-50">
						<img class="h-8 w-auto" src="/image/nmit.png" alt="namespace it blog" />
					</Link>
					<div class="flex-1 flex flex-col overflow-y-auto">
						<nav class="flex-1 px-2 py-4 space-y-1" aria-label="Sidebar">
							<template v-for="item in navigation" :key="item.name">
								<div v-if="!item.children">
									<a :href="item.href" :class="[item.current ? 'bg-gray-200 text-gray-700' : 'text-gray-700 hover:bg-gray-300 hover:text-gray-700', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
										<component :is="item.icon" :class="[item.current ? 'text-gray-700' : 'text-gray-700 group-hover:text-gray-700', 'mr-3 flex-shrink-0 h-6 w-6']" aria-hidden="true" />
										{{ item.name }}
									</a>
								</div>
								<Disclosure as="div" v-else class="space-y-1" v-slot="{open}">
									<DisclosureButton :class="[item.current ? 'bg-gray-200 text-gray-700' : 'text-gray-700 hover:bg-gray-300 hover:text-gray-700', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md']">
										<component :is="item.icon" class="mr-3 flex-shrink-0 h-6 w-6 text-gray-700 group-hover:text-gray-700" aria-hidden="true" />
										<span class="flex-1">
											{{ item.name }}
										</span>
										<svg :class="[open ? 'text-gray-700 rotate-90' : 'text-gray-700', 'ml-3 flex-shrink-0 h-5 w-5 transform group-hover:text-gray-400 transition-colors ease-in-out duration-150']" viewBox="0 0 20 20" aria-hidden="true">
											<path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
										</svg>
									</DisclosureButton>
									<DisclosurePanel class="space-y-1 ml-10">
										<Link v-for="subItem in item.children" :key="subItem.name" :href="subItem.href" class="'bg-gray-200 text-gray-700' : 'text-gray-700 hover:bg-gray-300 hover:text-gray-700', 'group flex items-center px-2 py-2 text-sm font-medium rounded-md'">
											{{ subItem.name }}
										</Link>
									</DisclosurePanel>
								</Disclosure>
							</template>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="flex flex-col w-0 flex-1 overflow-hidden">
			<div class="relative z-10 flex-shrink-0 flex h-16 bg-white shadow">
				<button type="button" class="px-4 border-r border-gray-200 text-gray-500 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 md:hidden" @click="sidebarOpen = true">
					<span class="sr-only">Open sidebar</span>
					<MenuAlt2Icon class="h-6 w-6" aria-hidden="true" />
				</button>
				<div class="flex-1 px-4 flex justify-between">
					<div class="flex-1 flex">
						<form class="w-full flex md:ml-0" action="#" method="GET"></form>
					</div>
					<div class="ml-4 flex items-center md:ml-6">
						<strong>{{ $page.props.user.name }}</strong>
						<!-- Profile dropdown -->
						<Menu as="div" class="ml-3 relative">
							<div>
								<MenuButton class="max-w-xs bg-white flex items-center text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
									<span class="sr-only">Open user menu</span>
									<img class="h-8 w-8 rounded-full" :src="$page.props.auth.user.image" alt />
								</MenuButton>
							</div>
							<transition enter-active-class="transition ease-out duration-100" enter-from-class="transform opacity-0 scale-95" enter-to-class="transform opacity-100 scale-100" leave-active-class="transition ease-in duration-75" leave-from-class="transform opacity-100 scale-100" leave-to-class="transform opacity-0 scale-95">
								<MenuItems class="origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none">
									<MenuItem v-slot="{active}">
										<!-- <Link :href="route('app.profile.show', $page.props.auth.user.slug)" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</Link> -->
										<Link href="#" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Your Profile</Link>
									</MenuItem>
									<MenuItem v-slot="{active}">
										<Link :href="route('logout')" method="POST" :class="[active ? 'bg-gray-100' : '', 'block px-4 py-2 text-sm text-gray-700']">Sign Out</Link>
									</MenuItem>
								</MenuItems>
							</transition>
						</Menu>
					</div>
				</div>
			</div>

			<main class="flex-1 relative overflow-y-auto focus:outline-none">
				<div class="py-6">
					<div class="container mx-auto pt-4">
						<slot></slot>
					</div>
				</div>
			</main>
		</div>
	</div>

	<!-- Notification Starts -->
	<!-- <Notification /> -->
</template>

<script>
import {Disclosure, DisclosureButton, DisclosurePanel} from "@headlessui/vue"
// import Notification from "../../Components/Notification.vue"
import {ref} from "vue"
import {Dialog, DialogOverlay, Menu, MenuButton, MenuItem, MenuItems, TransitionChild, TransitionRoot} from "@headlessui/vue"
import {BellIcon, CalendarIcon, ChartBarIcon, FolderIcon, HomeIcon, InboxIcon, MenuAlt2Icon, UsersIcon, XIcon, PlayIcon, FilmIcon, UserGroupIcon, CogIcon, OfficeBuildingIcon, UserIcon, UserCircleIcon, CurrencyBangladeshiIcon, DatabaseIcon, FlagIcon} from "@heroicons/vue/outline"
import {ClipboardListIcon, SearchIcon} from "@heroicons/vue/solid"
import {Link} from "@inertiajs/inertia-vue3"

const userNavigation = [
	{name: "Your Profile", href: "#"},
	{name: "Settings", href: "#"},
	{name: "Sign out", href: "#"},
]

const navigation = [
	{
		name: "Dashboard",
		href: "/app/dashboard",
		icon: HomeIcon,
		current: true,
	},

	{name: "Blog", href: "/app/blogs", icon: DatabaseIcon, current: false},
	{name: "User", href: "#", icon: UserGroupIcon, current: false},

	// {
	// 	name: "Settings",
	// 	icon: ChartBarIcon,
	// 	current: false,
	// 	children: [
	// 		{
	// 			name: "Role Management",
	// 			href: "/app/roles",
	// 			icon: CogIcon,
	// 			current: false,
	// 		},
	// 	],
	// },
]

export default {
	components: {
		Dialog,
		DialogOverlay,
		Menu,
		MenuButton,
		MenuItem,
		MenuItems,
		TransitionChild,
		TransitionRoot,
		BellIcon,
		MenuAlt2Icon,
		SearchIcon,
		XIcon,
		UserGroupIcon,
		CogIcon,
		OfficeBuildingIcon,
		UserIcon,
		UserCircleIcon,
		Link,
		Disclosure,
		DisclosureButton,
		DisclosurePanel,
		// Notification,
		CurrencyBangladeshiIcon,
		DatabaseIcon,
		FlagIcon,
	},
	setup() {
		const sidebarOpen = ref(false)

		return {
			navigation,
			userNavigation,
			sidebarOpen,
		}
	},
}
</script>
