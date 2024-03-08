@extends('layouts.app') {{-- Tailwind CSSを含むメインレイアウト --}}

@section('content')
<div class="container mx-auto mt-8">
 <div class="flex justify-between mb-6">
  <form class="flex" action="{{ route('index') }}" method="GET">
   <input type="text" name="searchQuery" value="{{ request('searchQuery') }}" placeholder="Search..."
    class="shadow appearance-none border rounded py-2 px-3 text-grey-darker mr-4">
   <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
    検索
   </button>
  </form>
  <a href="{{ route('pages.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
   メモを追加
  </a>
 </div>

 <div class="bg-white shadow-md rounded my-6">
  <table class="text-left w-full border-collapse">
   <thead>
    <tr>
     <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">タイトル
     </th>
     <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">内容
     </th>
     <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">作成日時
     </th>
     <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">編集
     </th>
     <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">削除
     </th>
    </tr>
   </thead>
   <tbody>
    @foreach ($pages as $page)
    <tr class="hover:bg-grey-lighter">
     <td class="py-4 px-6 border-b border-grey-light">{{ $page['title'] }}</td>
     <td class="py-4 px-6 border-b border-grey-light">{{ $page['content'] }}</td>
     <td class="py-4 px-6 border-b border-grey-light">{{ $page['created_at']->format('Y年m月d日H時i分s秒') }}</td>
     <td class="py-4 px-6 border-b border-grey-light">
      <a href="{{ route('pages.edit', $page['id']) }}" class="text-blue-500 hover:text-blue-800">編集</a>
     </td>
     <td class="py-4 px-6 border-b border-grey-light">
      <form action="{{ route('pages.destroy', $page['id']) }}" method="POST">
       @csrf
       @method('DELETE')
       <button type="submit" class="text-red-500 hover:text-red-800">削除</button>
      </form>
     </td>
    </tr>
    @endforeach
   </tbody>
  </table>
 </div>
</div>
@endsection