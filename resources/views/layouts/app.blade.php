@props(['title' => '', 'footerLinks' => ''])

<x-base-layout :title="$title" bodyClass="Something">
  <x-layouts.header />
  {{ $slot }}
</x-base-layout>
