<!-- <script>
    @foreach($events as $key => $event)
    events[{
        {
            $key
        }
    }] = {
        summary: "{{$event->getSummary()}}",
        description: "{{$event->getDesc()}}",
        start: "{{$event->getStartFormat($param->getFormat())}}",
        end: "{{$event->getEndFormat($param->getFormat())}}",
        time: "{{$event->getDiff()}}",
        guest: "{{$event->getAttendeesName()}}",
        location: "{{$event->getLocation()}}",
    }
    @endforeach
    var total = {
        {
            count($events)
        }
    }
    var startTime = "{{$param->getStart()}}"
    var endTime = "{{$param->getEnd()}}"
</script> -->
