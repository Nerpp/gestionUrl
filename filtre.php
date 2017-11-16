 /**
     * Filters the POST variable and returns the array of matching properties.
     * @return array
     */
    public static function filterPost(): array {

        // Arguments for Filter
        $args = array(
            'requester_id'      => FILTER_SANITIZE_NUMBER_INT,
            'date_requested'    => FILTER_SANITIZE_STRING,
            'time_requested'    => FILTER_SANITIZE_STRING,
            'date_required'     => FILTER_SANITIZE_STRING,
            'time_required'     => FILTER_SANITIZE_STRING,
            'start_location'    => FILTER_SANITIZE_NUMBER_INT,
            'end_location'      => FILTER_SANITIZE_NUMBER_INT,
            'other_info'        => FILTER_UNSAFE_RAW,
            'driver_comments'   => FILTER_UNSAFE_RAW,
            'items'             => array(
                'filter' => FILTER_DEFAULT,
                'flags'  => FILTER_REQUIRE_ARRAY
            ),
            'quantities'        => array(
                'filter' => FILTER_DEFAULT,
                'flags'  => FILTER_REQUIRE_ARRAY
            ),
            'quantitytypes'     => array(
                'filter' => FILTER_DEFAULT,
                'flags'  => FILTER_REQUIRE_ARRAY
            ),
            'request_id'        => FILTER_SANITIZE_NUMBER_INT,
            'driver_id'         => FILTER_SANITIZE_NUMBER_INT,
            'date_transferred'  => FILTER_SANITIZE_STRING,
            'time_transferred'  => FILTER_SANITIZE_STRING,
        );

        // Input Filter
        $filtered =  filter_input_array(INPUT_POST, $args);

        // Set Numbers
        foreach ($filtered as $key => $value) {
            if ($args[$key] === FILTER_SANITIZE_NUMBER_INT) {
                $filtered[$key] = (int)$value;
            }
        }

        // Return Filtered and Type-Cast Array
        return $filtered;
    }
