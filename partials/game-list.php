<?php
// partials/game-list.php
// Expects $result (mysqli_result) and $totalPages, $_GET['page']
?>
<div class="row" id="game-list">
    <?php if ($result && $result->num_rows > 0): ?>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="single-game-wrap style-box">
                    <div class="thumb mb-4">
                        <a href="/game/<?= urlencode($row['slug']) ?>/"><img src="<?= htmlspecialchars($row['thumbnail']) ?>" alt="<?= htmlspecialchars($row['title']) ?>"></a>
                    </div>
                    <div class="details mt-2">
                        <h6 class="title">
                            <a href="/game/<?= urlencode($row['slug']) ?>/"><?= htmlspecialchars($row['title']) ?></a>
                        </h6>
                        <div class="tags">
                            <span class="badge badge-platform"><?= htmlspecialchars($row['platform']) ?></span>
                            <span class="badge badge-style"><?= htmlspecialchars($row['fishing_style']) ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>No games found.</p>
    <?php endif; ?>
</div>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <?php
        $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        for ($p = 1; $p <= $totalPages; $p++):
            $active = $p === $currentPage ? ' active' : '';
            $query = array_merge($_GET, ['page' => $p]);
            ?>
            <li class="page-item<?= $active ?>">
                <a class="page-link" href="?<?= http_build_query($query) ?>"><?= $p ?></a>
            </li>
        <?php endfor; ?>
    </ul>
</nav>
