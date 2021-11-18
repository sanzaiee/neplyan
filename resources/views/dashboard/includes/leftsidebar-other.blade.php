<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
       <nav class="sidebar-nav">
          <ul id="sidebarnav">
            @forelse ($product->other_topic as $index1 => $item)
                <li>
                    @php
                        $count = $index1 + 1;
                    @endphp
                    <a class="has-arrow waves-effect waves-dark showSingle"
                    aria-expanded="false" data-target="{{ $item->id }}topic"><i class="ti-layout-accordion-merged"></i><span
                    class="hide-menu">{{ ucfirst($item->heading) }} : {{ $item->title??'' }}</span></a>

                    <ul aria-expanded="false" class="collapse">
                        @forelse ($item->otherTopicContent as $index2 => $tc)
                            <li><a class="showSingle" data-target="{{ $tc->id }}topiccontent">{{ $count }}.{{ ++$index2 }} {{ ucfirst($tc->title) }}</a></li>
                        @empty
                        @endforelse
                    </ul>
                </li>
            @empty
            @endforelse
             {{--  {{ dd($s) }}  --}}
          </ul>
       </nav>
       <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
 </aside>
