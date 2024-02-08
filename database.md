# Table 1 : Asitha Sandaruwan

'''sql

CREATE TABLE `customer_reg` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

# Table 2 : Asitha Sandaruwan

CREATE TABLE `staffreg` (
  `id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `phone_number` int NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



# Table 3 : Kasun Chathuranga Dissanayaka

-- Table structure for table `TourPlanCard`
--

CREATE TABLE `TourPlanCard` (
  `TOUR_PLN_ID` int NOT NULL,
  `TOUR_PLN_TITLE` varchar(60) NOT NULL,
  `TOUR_PLN_DESCRIPTION` varchar(500) NOT NULL,
  `TOUR_PLN_IMAGE` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TOUR_PLN_DAYS` int NOT NULL,
  `TOUR_PLN_PERSON_PRICE` int NOT NULL,
  `TOUR_PLN_CREATED_BY` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `TOUR_PLN_CREATED_DATE` timestamp NOT NULL,
  `TOUR_PLN_MODIFIED_BY` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `TOUR_PLN_MODIFIED_DATE` timestamp NULL DEFAULT NULL,
  `TOUR_PLN_ROW_ID` int DEFAULT NULL,
  `TOUR_PLN_STATUS` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

''''

# Table 4 : Mujitha Manorathna

-- Table structure for table `Customer_Booking`
--

CREATE TABLE `Customer_Booking` (
  `booking_id` int NOT NULL,
  `customer_id` int NOT NULL,
  `package_id` int NOT NULL,
  `booking_date` date NOT NULL,
  `number_of_Pax` int NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

# Table 5 : Mujitha Manorathna

-- Table structure for table `Staff_role`
--

CREATE TABLE `Staff_role` (
  `Role_id` int NOT NULL,
  `Role_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;