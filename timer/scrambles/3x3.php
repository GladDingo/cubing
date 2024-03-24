<?php include "../scramble-generator.php" ?>
<script>
    const moves = ["U", "U'", "U2", "D", "D'", "D2", "L", "L'", "L2", "R", "R'", "R2", "F", "F'", "F2", "B", "B'", "B2"];

    const newScramble = generateScramble();
    updateScrambleDisplay(newScramble);

    // Function to generate a random integer
    function getRandomInt(max) {
        return Math.floor(Math.random() * max);
    }

    // Function to generate a random scramble
    function generateScramble() {
        const scrambleLength = 20; // You can adjust this as needed
        let scramble = "";

        let previousMove = ""; // Initialize with an empty move

        // Define an array of disallowed pattern pairs
        const disallowedPatterns = [
            ["U", "D", "U"],
            ["U", "D", "U'"],
            ["U", "D", "U2"],
            ["U", "D'", "U"],
            ["U", "D'", "U'"],
            ["U", "D'", "U2"],
            ["U", "D2", "U"],
            ["U", "D2", "U'"],
            ["U", "D2", "U2"],
            ["U'", "D", "U"],
            ["U'", "D", "U'"],
            ["U'", "D", "U2"],
            ["U'", "D'", "U"],
            ["U'", "D'", "U'"],
            ["U'", "D'", "U2"],
            ["U'", "D2", "U"],
            ["U'", "D2", "U'"],
            ["U'", "D2", "U2"],
            ["U2", "D", "U"],
            ["U2", "D", "U'"],
            ["U2", "D", "U2"],
            ["U2", "D'", "U"],
            ["U2", "D'", "U'"],
            ["U2", "D'", "U2"],
            ["U2", "D2", "U"],
            ["U2", "D2", "U'"],
            ["U2", "D2", "U2"],

            ["L", "R", "L"],
            ["L", "R", "L'"],
            ["L", "R", "L2"],
            ["L", "R'", "L"],
            ["L", "R'", "L'"],
            ["L", "R'", "L2"],
            ["L", "R2", "L"],
            ["L", "R2", "L'"],
            ["L", "R2", "L2"],
            ["L'", "R", "L"],
            ["L'", "R", "L'"],
            ["L'", "R", "L2"],
            ["L'", "R'", "L"],
            ["L'", "R'", "L'"],
            ["L'", "R'", "L2"],
            ["L'", "R2", "L"],
            ["L'", "R2", "L'"],
            ["L'", "R2", "L2"],
            ["L2", "R", "L"],
            ["L2", "R", "L'"],
            ["L2", "R", "L2"],
            ["L2", "R'", "L"],
            ["L2", "R'", "L'"],
            ["L2", "R'", "L2"],
            ["L2", "R2", "L"],
            ["L2", "R2", "L'"],
            ["L2", "R2", "L2"],

            ["F", "B", "F"],
            ["F", "B", "F'"],
            ["F", "B", "F2"],
            ["F", "B'", "F"],
            ["F", "B'", "F'"],
            ["F", "B'", "F2"],
            ["F", "B2", "F"],
            ["F", "B2", "F'"],
            ["F", "B2", "F2"],
            ["F'", "B", "F"],
            ["F'", "B", "F'"],
            ["F'", "B", "F2"],
            ["F'", "B'", "F"],
            ["F'", "B'", "F'"],
            ["F'", "B'", "F2"],
            ["F'", "B2", "F"],
            ["F'", "B2", "F'"],
            ["F'", "B2", "F2"],
            ["F2", "B", "F"],
            ["F2", "B", "F'"],
            ["F2", "B", "F2"],
            ["F2", "B'", "F"],
            ["F2", "B'", "F'"],
            ["F2", "B'", "F2"],
            ["F2", "B2", "F"],
            ["F2", "B2", "F'"],
            ["F2", "B2", "F2"],

            ["D", "U", "D"],
            ["D", "U", "D'"],
            ["D", "U", "D2"],
            ["D", "U'", "D"],
            ["D", "U'", "D'"],
            ["D", "U'", "D2"],
            ["D", "U2", "D"],
            ["D", "U2", "D'"],
            ["D", "U2", "D2"],
            ["D'", "U", "D"],
            ["D'", "U", "D'"],
            ["D'", "U", "D2"],
            ["D'", "U'", "D"],
            ["D'", "U'", "D'"],
            ["D'", "U'", "D2"],
            ["D'", "U2", "D"],
            ["D'", "U2", "D'"],
            ["D'", "U2", "D2"],
            ["D2", "U", "D"],
            ["D2", "U", "D'"],
            ["D2", "U", "D2"],
            ["D2", "U'", "D"],
            ["D2", "U'", "D'"],
            ["D2", "U'", "D2"],
            ["D2", "U2", "D"],
            ["D2", "U2", "D'"],
            ["D2", "U2", "D2"],

            ["R", "L", "R"],
            ["R", "L", "R'"],
            ["R", "L", "R2"],
            ["R", "L'", "R"],
            ["R", "L'", "R'"],
            ["R", "L'", "R2"],
            ["R", "L2", "R"],
            ["R", "L2", "R'"],
            ["R", "L2", "R2"],
            ["R'", "L", "R"],
            ["R'", "L", "R'"],
            ["R'", "L", "R2"],
            ["R'", "L'", "R"],
            ["R'", "L'", "R'"],
            ["R'", "L'", "R2"],
            ["R'", "L2", "R"],
            ["R'", "L2", "R'"],
            ["R'", "L2", "R2"],
            ["R2", "L", "R"],
            ["R2", "L", "R'"],
            ["R2", "L", "R2"],
            ["R2", "L'", "R"],
            ["R2", "L'", "R'"],
            ["R2", "L'", "R2"],
            ["R2", "L2", "R"],

            ["B", "F", "B"],
            ["B", "F", "B'"],
            ["B", "F", "B2"],
            ["B", "F'", "B"],
            ["B", "F'", "B'"],
            ["B", "F'", "B2"],
            ["B", "F2", "B"],
            ["B", "F2", "B'"],
            ["B", "F2", "B2"],
            ["B'", "F", "B"],
            ["B'", "F", "B'"],
            ["B'", "F", "B2"],
            ["B'", "F'", "B"],
            ["B'", "F'", "B'"],
            ["B'", "F'", "B2"],
            ["B'", "F2", "B"],
            ["B'", "F2", "B'"],
            ["B'", "F2", "B2"],
            ["B2", "F", "B"],
            ["B2", "F", "B'"],
            ["B2", "F", "B2"],
            ["B2", "F'", "B"],
            ["B2", "F'", "B'"],
            ["B2", "F'", "B2"],
            ["B2", "F2", "B"],
            ["B2", "F2", "B'"],
            ["B2", "F2", "B2"]

        ];


        for (let i = 0; i < scrambleLength; i++) {
            const randomMoveIndex = getRandomInt(moves.length);
            const currentMove = moves[randomMoveIndex];

            // Check for consecutive redundant moves
            if (i > 0 && currentMove.charAt(0) === previousMove.charAt(0)) {
                i--; // Retry this iteration to generate a different move
                continue;
            }

            // Check for disallowed patterns
            if (
                i > 1 &&
                disallowedPatterns.some(pattern => {
                    return (
                        currentMove.charAt(0) === pattern[0] &&
                        previousMove.charAt(0) === pattern[1]
                    );
                })
            ) {
                i--; // Retry this iteration to generate a different move
                continue;
            }

            scramble += currentMove + " ";
            previousMove = currentMove;
        }

        return scramble.trim();
    }

</script>