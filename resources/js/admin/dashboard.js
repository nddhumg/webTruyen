document.addEventListener("DOMContentLoaded", () => {
  // Dữ liệu biểu đồ
  const ctx = document.getElementById("viewsChart");
  new Chart(ctx, {
    type: "bar",
    data: {
      labels: ["Truyện A", "Truyện B", "Truyện C", "Truyện D", "Truyện E"],
      datasets: [
        {
          label: "Lượt xem",
          data: [1200, 980, 760, 1350, 1100],
          backgroundColor: "rgba(59, 130, 246, 0.7)",
          borderRadius: 6,
        },
      ],
    },
    options: {
      responsive: true,
      scales: {
        y: { beginAtZero: true },
      },
    },
  });

  // Hoạt động gần đây
  const activities = [
    { user: "Minh", action: "Thêm truyện mới: 'Kiếm Hiệp Đại Chiến'", time: "10 phút trước" },
    { user: "Lan", action: "Chỉnh sửa thể loại: 'Hài hước'", time: "30 phút trước" },
    { user: "Admin", action: "Xóa user: 'guest123'", time: "1 giờ trước" },
    { user: "Hoàng", action: "Đăng bình luận", time: "2 giờ trước" },
  ];

  const activityTable = document.getElementById("activityTable");
  activities.forEach(act => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td class="p-3 border-b">${act.user}</td>
      <td class="p-3 border-b">${act.action}</td>
      <td class="p-3 border-b text-gray-500">${act.time}</td>
    `;
    activityTable.appendChild(row);
  });
});
