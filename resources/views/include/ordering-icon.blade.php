@if ($orderAsc && $orderBy === $order)
    <i class="fas fa-sort-up"></i>
@elseif (!$orderAsc && $orderBy === $order)
    <i class="fas fa-sort-down"></i>
@else
    <i class="fas fa-sort"></i>
@endif